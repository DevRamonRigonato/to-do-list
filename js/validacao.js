// js/validacao.js
// Validação da página de contato: e-mail fixo no formato joao.silva@net.com + CPF 999.999.999-99
(function(){
  const form = document.getElementById('formContato');
  const email = document.getElementById('email');
  const cpf = document.getElementById('cpf');
  const erroEmail = document.getElementById('erro-email');
  const erroCpf = document.getElementById('erro-cpf');
  const sucesso = document.getElementById('sucesso'); // Mensagem de sucesso

  const emailRegex = /^[a-z]+\.[a-z]+@net\.com$/; // exigido pelo professor
  const cpfRegex = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;

  function show(el, msg){ el.textContent = msg; el.style.display='block'; }
  function hide(el){ el.textContent=''; el.style.display='none'; }

  form.addEventListener('submit', function(e){
    e.preventDefault(); // evita reload
    let ok = true;

    hide(erroEmail); hide(erroCpf);

    if(!emailRegex.test(email.value.trim())){
      show(erroEmail, 'Use exatamente o formato joao.silva@net.com');
      ok = false;
    }
    if(!cpfRegex.test(cpf.value.trim())){
      show(erroCpf, 'Use o formato 999.999.999-99');
      ok = false;
    }

    if(!ok) return;

    // ✅ Exibe mensagem de sucesso animada
    sucesso.innerHTML = "✅ Mensagem enviada com sucesso!";
    sucesso.classList.add("show");

    // Oculta após 3 segundos com fade
    setTimeout(() => {
      sucesso.classList.remove("show");
    }, 3000);

    // limpa form
    form.reset();
  });

  // feedback ao digitar
  email.addEventListener('input', ()=>{
    if(email.value.trim()==='' || emailRegex.test(email.value.trim())) hide(erroEmail);
    else show(erroEmail, 'Exemplo: joao.silva@net.com');
  });
  cpf.addEventListener('input', ()=>{
    if(cpf.value.trim()==='' || cpfRegex.test(cpf.value.trim())) hide(erroCpf);
    else show(erroCpf, 'Formato: 999.999.999-99');
  });

})();
