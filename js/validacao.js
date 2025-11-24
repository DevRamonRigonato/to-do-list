// js/validacao.js
// Validação completa do formulário de contato:
// - Nome obrigatório
// - E-mail no formato nome.sobrenome@net.com (aceita números)
// - CPF no formato 999.999.999-99
// - Assunto obrigatório
// - Mensagem obrigatória

(function(){

  const form = document.getElementById('formContato');

  const nome = document.getElementById('nome');
  const email = document.getElementById('email');
  const cpf = document.getElementById('cpf');
  const assunto = document.getElementById('assunto');
  const mensagem = document.getElementById('mensagem');

  const erroNome = document.getElementById('erro-nome');
  const erroEmail = document.getElementById('erro-email');
  const erroCpf = document.getElementById('erro-cpf');
  const erroAssunto = document.getElementById('erro-assunto');
  const erroMsg = document.getElementById('erro-msg');

  const sucesso = document.getElementById('sucesso');

  // Regex
  const emailRegex = /^[a-z0-9._-]+@net\.com$/i;
  const cpfRegex   = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;

  function showError(el, msg){
    el.textContent = msg;
    el.style.display = 'block';
  }

  function clearError(el){
    el.textContent = '';
    el.style.display = 'none';
  }

  form.addEventListener('submit', function(e){
    e.preventDefault(); // evitar reload

    let ok = true;

    // limpar erros
    clearError(erroNome);
    clearError(erroEmail);
    clearError(erroCpf);
    clearError(erroAssunto);
    clearError(erroMsg);

    // valida nome
    if(nome.value.trim() === ''){
      showError(erroNome, 'Digite seu nome.');
      ok = false;
    }

    // valida e-mail
    if(!emailRegex.test(email.value.trim())){
      showError(erroEmail, 'Use o formato nome.sobrenome@net.com');
      ok = false;
    }

    // valida CPF
    if(!cpfRegex.test(cpf.value.trim())){
      showError(erroCpf, 'Formato correto: 999.999.999-99');
      ok = false;
    }

    // valida assunto
    if(assunto.value.trim() === ''){
      showError(erroAssunto, 'Digite o assunto da mensagem.');
      ok = false;
    }

    // valida mensagem
    if(mensagem.value.trim() === ''){
      showError(erroMsg, 'Escreva sua mensagem.');
      ok = false;
    }

    if(!ok) return;

    // Sucesso 👇
    sucesso.innerHTML = "✅ Mensagem enviada com sucesso!";
    sucesso.classList.add("show");

    setTimeout(() => {
      sucesso.classList.remove("show");
    }, 3000);

    form.reset();
  });

  // Feedback dinâmico ao digitar
  nome.addEventListener('input', () => {
    if(nome.value.trim() !== '') clearError(erroNome);
  });

  email.addEventListener('input', () => {
    if(emailRegex.test(email.value.trim()) || email.value.trim() === '')
      clearError(erroEmail);
  });

  cpf.addEventListener('input', () => {
    if(cpfRegex.test(cpf.value.trim()) || cpf.value.trim() === '')
      clearError(erroCpf);
  });

  assunto.addEventListener('input', () => {
    if(assunto.value.trim() !== '') clearError(erroAssunto);
  });

  mensagem.addEventListener('input', () => {
    if(mensagem.value.trim() !== '') clearError(erroMsg);
  });

})();
