{% extends 'partials/body.twig.php'  %}

{% block title %}Cadastro -Netshow Interview{% endblock %}

{% block body %}
<div class="max-width center-screen bg-white padding">
  <h1>Cadastro</h1>
	<form action="{{BASE}}cadastrar" method="post" enctype="multipart/form-data" >
		<div class="form-group">
			<label for="name">Nome</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Informe o seu nome completo" />
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="name@exemplo.com" />
			</div>
			<div class="form-group col-md-6">
				<label for="phone">Telefone</label>
				<input type="text" class="phone form-control" id="phone" name="phone" data-mask="(##) #####-####" placeholder="Informe o seu numero de telefone" />
			</div>
		</div>
		<div class="form-group">
			<label for="message">Mensagem</label>
			<textarea class="form-control" id="message" name="message" rows="3"></textarea>
		</div>
		<div class="form-group">
			<label for="document">Arquivo</label>
			<input type="file" class="form-control-file" id="document" name="document" accept="{{ACCEPTED_FILES}}"/>
		</div>
		<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
	</form>
</div>
{% endblock %}