// js/carrega_dados.js
// Carrega dados do dados.json e popula a tabela
(async function(){
  try{
    const resp = await fetch('dados.json');
    const dados = await resp.json();
    const tbody = document.querySelector('#tabela-dados tbody');

    dados.forEach(item => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="center"><img class="thumbnail" src="${item.imagem}" alt="${item.titulo}"></td>
        <td>${item.titulo}</td>
        <td>${item.descricao}</td>
        <td><span class="badge ${item.status === 'Concluído' ? 'ok' : item.status === 'Em andamento' ? 'info' : 'warn'}">${item.status}</span></td>
      `;
      tbody.appendChild(tr);
    });
  }catch(err){
    console.error('Erro ao carregar os dados:', err);
  }
})();
