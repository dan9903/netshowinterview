{% extends 'partials/body.twig.php'  %}

{% block title %}Home - Netshow Interview{% endblock %}

{% block body %}
<div class="max-width center-screen bg-white padding">
    <h1>Home Page</h1>

    <h3 class="mt-4"> Seja bem vindo ao meu teste!</h3>
    <p class="mb-0">Clique no menu de cadastro acima ou <a href="{{BASE}}cadastro">aqui</a> para continuar testando a aplicação.</p>
    <p class="mt-0">Preencha os dados corretamente para se cadastrar no nosso sistema e ter a oportunidade de trabalhar conosco!</p>
</div>
{% endblock %}