$(document).ready(function(){
	$.noConflict();

	getCart();
	
	$('#cart').on('change', '#cantidad', updateQuantity);

	$('#btn-agregar').click(function(e){
		e.preventDefault();
		addProductToCart();
	});

	$('#cart tr').each(function(k){
		$('#cart').on('change', '#cantidad'+k, updateQuantity);
	})


	$('#buy').click(function(){
		buy2();
	})


});

function getCart(){


		var cart = JSON.parse(localStorage.getItem('cart'));

		var rows = '';
		$.each(cart, function(key, value){
			rows += '<tr>';
				rows += '<td id="id'+key+'">'+value.id+'</td>';
				rows += '<td>'+value.name+'</td>';
				rows += '<td id="precio'+key+'">'+value.price+'</td>';
				rows += '<td><select id="cantidad'+key+'" class="form-control">'+
							'<option value="'+value.quantity+'">'+value.quantity+'</option>'+
							'<option value="1">1</option>'+
							'<option value="2">2</option>'+
							'<option value="3">3</option>'+
							'<option value="4">4</option>'+
							'<option value="5">5</option>'+
							'<option value="6">6</option>'+
							'<option value="7">7</option>'+
							'<option value="8">8</option>'+
							'<option value="9">9</option>'+
							'<option value="10">10</option>'+
						'</select></td>';
				rows += '<td id="sub"></td>'
				rows += '<td><button onclick="deleteProduct('+value.id+')" class="btn btn-danger btn-sm">Eliminar</button></td>';
			rows += '</tr>';
		});

		$('#cart').html(rows);
		calculateSubTotal(),
		calculateTotal();

}

function addProductToCart(){
			var id = $('#pro-id').val();
			var name = $('#name').val();
			var price = $('#price').val();
			var quantity = $('#quantity').val();

			var product = {
				id: id, 
				name: name,
				quantity: quantity,
				price: price
			};

			if (localStorage.getItem('cart') === null) {
				var cart = [];
				cart.push(product);
				localStorage.setItem('cart', JSON.stringify(cart));
			}else{

				var cart = JSON.parse(localStorage.getItem('cart'));
				cart.push(product);
				localStorage.setItem('cart', JSON.stringify(cart));
			}
			alert('Producto agregado al carrito');
			getCart();

}

function calculateSubTotal(){

	$('#cart tr').each(function(k){
		var subtotal = 0;
		var tr = $(this);
		var cantidad = parseInt(tr.find('#cantidad'+k).val());
		var precio = parseInt(tr.find('#precio'+k).text());

		var r = cantidad * precio;
		var subtotal = parseInt(tr.find('#sub').text(r));		
		
	})
}

function calculateTotal(){
	var sum = 0;
	$('#cart tr').each(function(){
		var tr = $(this);
		sum += parseInt(tr.find('td').eq(4).text());
	})
	$('#total').text(sum);
}

function deleteProduct(id){
	var cart = JSON.parse(localStorage.getItem('cart'));

	for (var i = 0; i < cart.length; i++) {
		 if (cart[i].id == id) {
		 	cart.splice(i, 1);
		 }
	}
	localStorage.setItem('cart', JSON.stringify(cart));
	getCart();
	alert('producto eliminado del carrito');	
}

function updateQuantity(){

		calculateSubTotal();
		calculateTotal();
}

function buy(){

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	var cantidadVendida = 0;

	$('#cart tr').each(function(k){
		
		var tr = $(this);
		var id = tr.find('td').eq(0).text();
		var cantidad = parseInt(tr.find('#cantidad'+k).val());
		var total = $('#total').text();
		var cantProductos = $('#cart tr').length;

		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: 'buy',
			data: {
				id 				: id,
				cantidad		: cantidad,
				total 			: total,
				cantProductos 	: cantProductos,
				cantidadVendida : cantidadVendida
			},
			success: function(response){
				console.log(response.cant + ' ' + response.value)
				window.location.href = ('boleta');
			}
		});
		cantidadVendida++;

	});
	localStorage.removeItem('cart');

}

function buy2(){

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	var datos = [];
	$('#cart tr').each(function(k){
		
		var tr = $(this);
		var id = tr.find('td').eq(0).text();
		var cantidad = parseInt(tr.find('#cantidad'+k).val());
		var total = $('#total').text();

		datos.push({
			id: id,
			cantidad: cantidad,
			total: total
		});
	});

	var cart = JSON.stringify(datos);

	$.ajax({
		url: 'buy',
		type: 'POST',
		dataType: 'json',
		data: {cart: cart},
		success: function(response){
			window.location.href = response.res;
		},
		error: function(error){
			console.log(error);
		}
	});
	localStorage.removeItem('cart');

}


