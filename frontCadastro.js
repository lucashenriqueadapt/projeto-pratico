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

function login() {
    const formData = new FormData();
    formData.append("acao", "login");
    formData.append("email", "henrique@gmail.com");
    formData.append("password", "lucas00123");

    dispararRequisicao(formData, (data) => {
        console.log(data);
    })
}

function cadastro() {
    const formData = new FormData();
    formData.append("acao", "cadastro");
    formData.append("nome", "lucas");
    formData.append("email", "henrique@gmail.com");
    formData.append("password", "lucas00123");

    dispararRequisicao(formData, (data) => {
        console.log(data);
    })
}