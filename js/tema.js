// js/tema.js
// Alterna entre tema claro e escuro e persiste no localStorage

function alternarTema(){
  const atual = localStorage.getItem('tema') || 'claro';
  const prox = (atual === 'claro') ? 'escuro' : 'claro';
  aplicarTema(prox);
  localStorage.setItem('tema', prox);
  // pequeno feedback visual no botão
  const btn = document.querySelector('.theme-toggle');
  if(btn){
    btn.classList.add('pulse');
    setTimeout(()=>btn.classList.remove('pulse'), 250);
  }
}

function aplicarTema(tema){
  const linkTema = document.getElementById('tema');
  linkTema.href = (tema === 'escuro') ? 'css/tema-escuro.css' : 'css/tema-claro.css';
}

// aplica tema salvo ao carregar
window.addEventListener('DOMContentLoaded', ()=>{
  const salvo = localStorage.getItem('tema') || 'claro';
  aplicarTema(salvo);
});
