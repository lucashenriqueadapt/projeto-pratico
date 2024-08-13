function dispararRequisicao(
    formdata,
    callback,
    url = '../../control.php'
) {
    fetch(url, {
        method: 'POST',
        body: formdata
    })
        .then(async e => callback(await e.json()))
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error.message);
        });
}

const { createApp } = Vue

const vueAppInstance = createApp({
    data() {
        return {
            veiculos: null,
            models: null,
            selectedFabricante: "",
            cadastro: {
                modelo: "",
                fabricante: "",
                veiculo: "",
                ano: ""
            }

        }
    },
    methods: {
        getFabricantes() {
            const formData = new FormData();
            formData.append("token", localStorage.getItem("token"))
            formData.append("acao", "getFabricantes")
            dispararRequisicao(formData, (data) => {
                if(data.status == 401) return window.location.href = '../../index.html' 
                this.models = data;
            })
        },
        getVeiculos() {
            const formData = new FormData();
            formData.append("acao", "getVeiculos")
            dispararRequisicao(formData, (data) => {
                this.veiculos = data;
            })
        },
        cadastroCar() {
            const formData = new FormData();
            formData.append("acao", "cadastroCar")
            formData.append("dados", JSON.stringify(this.cadastro));
            dispararRequisicao(formData, (data) => {
                if (data.status == 200) {
                    window.location.href = './index.html';
                }
            })
        }
    },
    computed: {
        filteredVeiculos() {
            if (!this.cadastro.fabricante) {
                return [];
            }
            return this.veiculos.filter(veiculo => veiculo.idfabricante === this.cadastro.fabricante);
        }
    },
    mounted() {
        this.getFabricantes();
        this.getVeiculos();
    }
}).mount('#VueAppInstanceCadastroCar')
