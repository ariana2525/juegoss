$(function () {

  $('#btn-departamentos').on("change",function(){

  		var _this=$(this);
  		var id=_this.val();
  		var _url=baseURL+'ubigeo/get_provincias_ajax';

  		Common._doAjax(_url,{id:id},
  			function(respuesta){
  				var _html;
  			if (Boolean(respuesta.status)) {
  				var _data=respuesta.data;
  				$.each(_data,function(index,value){

  						var _id=value.idProv;
  						var _provincia=value.provincia;
  						_html+="<option value='"+_id+"'>"+_provincia+"</option>";


  				});
  					$('#btn-provincia').html(_html);
  			};

  			},
  			false
  			);
  });


  $('#btn-provincia').on("change",function(){

  		var _this=$(this);
  		var id=_this.val();
  		var _url=baseURL+'ubigeo/get_distrito_ajax';

  		Common._doAjax(_url,{id:id},
  			function(respuesta){
  				var _html;
  			if (Boolean(respuesta.status)) {
  				var _data=respuesta.data;
  				$.each(_data,function(index,value){

  						var _id=value.idDist;
  						var _distrito=value.distrito;
  						_html+="<option value='"+_id+"'>"+_distrito+"</option>";


  				});
  					$('#btn-distrito').html(_html);
  			};

  			},
  			false
  			);
  });








});




var Common={

	_doAjax:function(_url,_data,f_done,f_error){
		$.ajax({
  			url:_url,
  			type: 'POST',
  			dataType: 'json',
  			data: _data,
  		})
  		.done(function(r) {
  			f_done(r);

  		})

  		.fail(function(r) {
  			f_error(r);
  		})

  		

	}
}



    
