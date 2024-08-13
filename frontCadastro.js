function dispararRequisicao(
    formdata,
    callback,
    url = 'control.php'
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

createApp({
    data() {
        return {
            cadastro: {
                nome: "",
                email: "",
                password: ""
            }
        }
    },
    methods: {
        cadastroUser() {
            const formData = new FormData();
            formData.append("acao", "cadastro")
            formData.append("dados", JSON.stringify(this.cadastro));
            dispararRequisicao(formData, (data) => {
                if (data.status == 200) {
                    window.location.href = './index.html';
                }
            })
        }
    }
}).mount('#VueAppInstanceCadastro')

// function cadastro() {
//     const formData = new FormData();
//     formData.append("acao", "cadastro");
//     formData.append("nome", "lucas");
//     formData.append("email", "henrique@gmail.com");
//     formData.append("password", "lucas00123");

//     dispararRequisicao(formData, (data) => {
//         console.log(data);
//     })
// }