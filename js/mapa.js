//  NÃO MEXER! QUANDO ESCREVI ESSE JS SÓ EU E DEUS SABIA O QUE ESTAVA FAZENDO, AGORA SÓ DEUS SABE!

const map = L.map('map').setView([-23.521761, -46.186010], 12);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

let marcacaoAtual = null;

document.getElementById('searchBtn').addEventListener('click', async () => {
    const query = document.getElementById('searchInput').value.trim();
    if(!query) return;

    const url = `buscar_local.php?q=${encodeURIComponent(query)}`;
    try{
        const response = await fetch(url);

        // const response = await fetch(url, {
        //     headers: {
        //         'User-Agent': 'MeuAppMapa/1.0 (seuemail@exemplo.com)'
        //     }
        // });


        const results = await response.json();

        if(results.length > 0) {
            const { lat, lon, display_name } = results[0];

            if(marcacaoAtual) {
                map.removeLayer(marcacaoAtual);
            }

            marcacaoAtual = L.marker([lat, lon]).addTo(map)
                // .bindPopup(display_name)
                // .openPopup();
 
            map.setView([lat, lon,], 14);

            console.log('buscou com sucesso')
        }else {
            alert('Nenhum local encontrado.');
        }   
    }catch(error) {
        console.error('Ocorreu um erro ao buscar o local.', error);
        alert('Ocorreu um erro ao buscar o local.');
    }
})






