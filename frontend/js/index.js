let divNews = document.querySelector("#news-list");

fetch("http://localhost:8000/resources/home.php").then((response) => {
  response.json().then((dados) => {
      dados.dados.map((news) => {
        if (news.length >= 15) return false;
        divNews.innerHTML += `
          <div class="news-item">
            <a href="${news.url}"></a>
            <img src="${news.img}" alt="Imagem da notícia">
            <h2>${news.title}</h2>
            <p class="news-abstract">${news.abstract}</p>
          </div>
        `;
      })
  })
})
