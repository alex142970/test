const commentsRoot = document.querySelector('#comments');
const form = document.querySelector('#form');
const btn = document.querySelector('#send');

const url = `/create`

window.onload = function () {
    form.addEventListener('submit', function (e) {

        btn.setAttribute("disabled", "disabled");

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                name: form.querySelector('#name').value,
                email: form.querySelector('#email').value,
                title: form.querySelector('#title').value,
                text: form.querySelector('#text').value,
            })
        }).then((res) => {

            btn.removeAttribute("disabled");

            if (res.status === 200)
                res.json().then(data => {
                    addComment(data)
                })
            else
                alert("Ошибка валидации")
        })

        e.preventDefault();
    })
}

function addComment(data) {

    const card = document.createElement('div');
    card.className = 'card mb-4';

    card.innerHTML = `
        <div class="card-body">
            <h5 class="card-title">${data.title}</h5>
            ${data.text}
        </div>
        <div class="card-footer text-muted">
            Оставлен в ${data.created_at}, пользователем ${data.name} (${data.email})
        </div>`;

    commentsRoot.appendChild(card);
}