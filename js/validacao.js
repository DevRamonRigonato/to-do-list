// js/validacao.js
// Validação: e-mail fixo + CPF com formato

(function () {
  const form = document.getElementById('formContato');
  const email = document.getElementById('email');
  const cpf = document.getElementById('cpf');
  const erroEmail = document.getElementById('erro-email');
  const erroCpf = document.getElementById('erro-cpf');
  const sucesso = document.getElementById('sucesso');

  const emailRegex = /^[a-z]+\.[a-z]+@net\.com$/;
  const cpfRegex = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;

  function show(el, msg) {
    el.textContent = msg;
    el.style.display = 'block';
  }
  function hide(el) {
    el.textContent = '';
    el.style.display = 'none';
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault(); // evitar recarregar página
    hide(erroEmail);
    hide(erroCpf);
    sucesso.style.display = 'none';

    let ok = true;

    if (!emailRegex.test(email.value.trim())) {
      show(erroEmail, 'Use exatamente o formato joao.silva@net.com');
      ok = false;
    }
    if (!cpfRegex.test(cpf.value.trim())) {
      show(erroCpf, 'Use o formato 999.999.999-99');
      ok = false;
    }

    if (!ok) return;

    // ✅ Se chegou aqui: sucesso
    form.reset();
    sucesso.style.display = 'block';
    sucesso.textContent = '✅ Formulário enviado com sucesso!';

    setTimeout(() => {
      sucesso.style.display = 'none';
    }, 4000);
  });

})();
