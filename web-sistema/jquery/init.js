$(document).ready(function(){
    $('[data-fancybox="gallery"]').fancybox({});
  	 $(".botao").click(function(){
	   $(this).parent().parent().find(".popup").fadeIn();
	   $('body').addClass("hidden");
	 });

	 $(".aviso").on('click', '.close', function(){
	   $(this).parents('.aviso').fadeOut();
	 });

     $(".popup").on('click', '.close', function(){
	   $(this).parents('.popup').fadeOut();
   	   $('body').removeClass("hidden");
	 });

     $('.telefone').mask('(00) 0000-0000?',{
		translation: {
			'?': {
				pattern: /[0-9]/, optional: true
			}
		}
	});
    initCPFCPNJ(11);
	jQuery(".cpf-cnpj").on('keyup',function() {
		initCPFCPNJ(14)
	});

	$('.cpf').mask('000.000.000-00', {reverse: true});
    $('.moeda').maskMoney({thousands:'.', decimal:',', allowZero: true});


    $('body').on('click', '.favorito', function(e){
        e.preventDefault();
        var $this = this;
        var class_fav = $(this).hasClass('on')?'on':'off';
        var acao =  $(this).hasClass('on')?'remover':'adicionar';
        var link = $(this).attr('href');
        $.ajax({
            type:'get',
    		url: link,
    		success:function (resp) {
                var response = JSON.parse(resp.trim());
                console.log(response);
                console.log(class_fav);
                if(response.status){
                    if(class_fav=='on'){
                        console.log('remove');
                        $($this).removeClass('on').addClass('off');
                        $($this).attr('href', link.replace('remove', 'add'));
                    }else{
                        console.log('adiciona');
                        $($this).removeClass('off').addClass('on');
                        $($this).attr('href', link.replace('add', 'remove'));
                    }
                }else{
                    alert('Não foi possível '+acao+' favorito!');
                }
    		},
            error:function(){
                alert('Não foi possível executar a operação!');
            }
    	});
    });

    $('body').on('click', '.emcontrato', function(e){
        e.preventDefault();
        if(!confirm('Tem certeza que deseja mover esse imóvel para "Em contrato"? Esse novo status será mantido pelo prazo de 10 dias a partir de agora.')){
            return false;
        }
        var $this = this;
        var link = $(this).attr('href');
        $.ajax({
            type:'get',
    		url: link,
    		success:function (resp) {
                var response = JSON.parse(resp.trim());

                if(response.status){
                    $($this).remove();
                    $('.cancelar-reserva').remove();
                    $('.renovar').remove();
                }else{
                    alert('Não foi possível alterar imovel em contrato!\n'+response.erro);
                }
    		},
            error:function(){
                alert('Não foi possível executar a operação!');
            }
    	});
    });

    $('body').on('click', '.renovar', function(e){
        e.preventDefault();
        if(!confirm('Tem certeza que deseja renovar a reserva desse imóvel?')){
            return false;
        }
        var $this = this;
        var link = $(this).attr('href');
        $.ajax({
            type:'get',
    		url: link,
    		success:function (resp) {
                var response = JSON.parse(resp.trim());

                if(response.status){
                    $($this).remove();
                }else{
                    alert('Não foi possível renovar reserva do imovel!\n'+response.erro);
                }
    		},
            error:function(){
                alert('Não foi possível executar a operação!');
            }
    	});
    });

    $('body').on('submit', '.form-reserva', function(e){
        e.preventDefault();
        var $this = this;
        var link = $(this).attr('action');
        $.ajax({
            type:'POST',
            data:$(this).serialize(),
    		url: link,
            beforeSend:function(){
                $($this).find('.retorno').html('');
            },
    		success:function (resp) {
                var response = JSON.parse(resp.trim());
                if(response.status){
                    $($this).find('.campos').remove();
                    $($this).find('.retorno').html('<div class="aviso text-center"><div class="sucesso"><h2>Reserva realizada com sucesso!</h2></div></div>');
                }else{
                    $($this).find('.retorno').html(response.erro);
                }
    		},
            error:function(){
                alert('Não foi possível executar a operação!');
            }
    	});
    });

    $('body').on('click', '.cancelar-reserva', function(e){
        e.preventDefault();
        if(!confirm('Tem certeza que deseja cancelar a reserva desse imóvel?')){
            return false;
        }
        var $this = this;
        var link = $(this).attr('href');
        $.ajax({
            type:'get',
    		url: link,
    		success:function (resp) {
                var response = JSON.parse(resp.trim());
                if(response.status){
                    $('.negociacao').remove();
                }else{
                    alert('Não foi possível cancelar a reserva!\n'+response.erro);
                }
    		},
            error:function(){
                alert('Não foi possível executar a operação!');
            }
    	});
    });


});

function initCPFCPNJ(s){
	if(jQuery('body').find(".cpf-cnpj").length <= 0) return false;
	if(jQuery(".cpf-cnpj").val().length>s){
		jQuery(".cpf-cnpj").mask('00.000.000/0000-00', {reverse: false})
	}else{
		jQuery(".cpf-cnpj").mask('000.000.000-00?', {reverse: false,translation: {
			'?': {
				pattern: /[0-9]/, optional: true
			}
		}});
	}
}
