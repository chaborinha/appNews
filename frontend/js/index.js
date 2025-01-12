async function getData() {

    const ul = document.getElementById('news-list');
    const url = "http://localhost:8000/resources/home.php";
    try {
      const response = await fetch(url);
      if (!response.ok) {
        throw new Error(`Response status: ${response.status}`);
      }
  
      const json = await response.json();

      for(i in json) {
        console.log(json[i].title)
        console.log(json[i].abstract)
        console.log("----------------")
      }

    } catch (error) {
      console.error(error.message);
    }
}
getData();  