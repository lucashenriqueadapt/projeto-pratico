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

const { createApp, ref } = Vue

  createApp({
    data() {
      return {
        login:{
            email:  "",
            password: ""
        }
      }
    },
    methods: {
        loginUser() {
            const formData = new FormData();
            formData.append("acao", "login")
            formData.append("dados", JSON.stringify(this.login));
            dispararRequisicao(formData, (data) => {
                if(data.status == 200){
                    localStorage.setItem("token", data.jwt)
                    window.location.href = './tabs';
                }
            })
        }
    }
  }).mount('#VueAppInstanceLogin')