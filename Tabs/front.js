
function dispararRequisicao(
    formdata,
    callback,
    url = '../control.php'
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
            cars: null,
            carsEditar: {
                id: 0,
                modelo: "",
                idfabricante: "",
                idveiculo: "",
                anofabricacao: 0
            },
            veiculos: null,
            models: null
        }
    },
    methods: {
        getAllCars() {
            const formData = new FormData();
            formData.append("acao", "getAllCars")
            formData.append("token", localStorage.getItem("token"))
            dispararRequisicao(formData, (data) => {
                if(data.status == 401) return window.location.href = '../index.html' 
                this.cars = data.data;
            })
        },
        getOneCar(id) {
            const formData = new FormData();
            formData.append("acao", "getOneCar")
            formData.append("id", id)
            dispararRequisicao(formData, (data) => {
                this.carsEditar = data.data
            })
        },
        updateCar() {
            const formData = new FormData();
            formData.append("acao", "updateCar")
            formData.append("dados", JSON.stringify(this.carsEditar))
            dispararRequisicao(formData, (data) => {
                this.getAllCars();
            })
        },
        deleteCar(id) {
            const formData = new FormData();
            formData.append("acao", "deleteCar")
            formData.append("id", id)
            dispararRequisicao(formData, (data) => {
                this.getAllCars();
            })
        },
        getFabricantes() {
            const formData = new FormData();
            formData.append("acao", "getFabricantes")
            dispararRequisicao(formData, (data) => {
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
    },
    computed: {
        filteredVeiculos() {
            if (!this.carsEditar.idfabricante) {
                return [];
            }
            return this.veiculos.filter(veiculo => veiculo.idfabricante === this.carsEditar.idfabricante);
        }
    },
    mounted() {
        this.getAllCars();
        this.getFabricantes();
        this.getVeiculos();
    }
}).mount('#VueAppInstanceListaCars')
