// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function () {
	// =============================
	// Private methods and propeties
	// =============================
	cart = [];

	// Constructor
	function Item(name, price, count) {
		this.name = name;
		this.price = price;
		this.count = count;
	}

	// Save cart
	function saveCart() {
		sessionStorage.setItem("shoppingCart", JSON.stringify(cart));
	}

	// Load cart
	function loadCart() {
		cart = JSON.parse(sessionStorage.getItem("shoppingCart"));
	}
	if (sessionStorage.getItem("shoppingCart") != null) {
		loadCart();
	}

	// =============================
	// Public methods and propeties
	// =============================
	var obj = {};

	// Add to cart
	obj.addItemToCart = function (name, price, count) {
		for (var item in cart) {
			if (cart[item].name === name) {
				cart[item].count++;
				saveCart();
				return;
			}
		}
		var item = new Item(name, price, count);
		cart.push(item);
		saveCart();
	};
	// Set count from item
	obj.setCountForItem = function (name, count) {
		for (var i in cart) {
			if (cart[i].name === name) {
				cart[i].count = count;
				break;
			}
		}
	};
	// Remove item from cart
	obj.removeItemFromCart = function (name) {
		for (var item in cart) {
			if (cart[item].name === name) {
				cart[item].count--;
				if (cart[item].count === 0) {
					cart.splice(item, 1);
				}
				break;
			}
		}
		saveCart();
	};

	// Remove all items from cart
	obj.removeItemFromCartAll = function (name) {
		for (var item in cart) {
			if (cart[item].name === name) {
				cart.splice(item, 1);
				break;
			}
		}
		saveCart();
	};

	// Clear cart
	obj.clearCart = function () {
		cart = [];
		saveCart();
	};

	// Count cart
	obj.totalCount = function () {
		var totalCount = 0;
		for (var item in cart) {
			totalCount += cart[item].count;
		}
		return totalCount;
	};

	// Total cart
	obj.totalCart = function () {
		var totalCart = 0;
		for (var item in cart) {
			totalCart += cart[item].price * cart[item].count;
		}
		return Number(totalCart.toFixed(2));
	};

	// List cart
	obj.listCart = function () {
		var cartCopy = [];
		for (i in cart) {
			item = cart[i];
			itemCopy = {};
			for (p in item) {
				itemCopy[p] = item[p];
			}
			itemCopy.total = Number(item.price * item.count).toFixed(2);
			cartCopy.push(itemCopy);
		}
		return cartCopy;
	};

	// cart : Array
	// Item : Object/Class
	// addItemToCart : Function
	// removeItemFromCart : Function
	// removeItemFromCartAll : Function
	// clearCart : Function
	// countCart : Function
	// totalCart : Function
	// listCart : Function
	// saveCart : Function
	// loadCart : Function
	return obj;
})();

// *****************************************
// Triggers / Events
// *****************************************
// Add item
$(".add-to-cart").click(function (event) {
	event.preventDefault();
	var name = $(this).data("name");
	var price = Number($(this).data("price"));
	shoppingCart.addItemToCart(name, price, 1);
	displayCart();
});

// Clear items
$(".clear-cart").click(function () {
	shoppingCart.clearCart();
	displayCart();
});

function displayCart() {
	var cartArray = shoppingCart.listCart();
	var output = "";
	for (var i in cartArray) {
		output +=
			"<div class='row py-2 border-bottom text-dark'><div class='col-4 my-auto'>" +
			cartArray[i].name +
			"</div><div class='col-3 my-auto text-center'><div class='d-flex justify-content-start pl-0 ml-0'><button class='minus-item bg-white text-dark m-0 p-0' style='border:none' data-name=" +
			cartArray[i].name +
			">-</button><input type='text' class='item-count mx-2' style='width:50px;text-align: center;border:solid 1px #e4e6fc'  data-name='" +
			cartArray[i].name +
			"' value='" +
			cartArray[i].count +
			"'><button class='plus-item bg-white text-dark p-0 m-0' style='border:none'  data-name=" +
			cartArray[i].name +
			">+</button></div></div><div class='col-4 my-auto'>Rp " +
			cartArray[i].total +
			"</div><div class='col-1 my-auto'><button class='delete-item bg-danger border-0 rounded px-2 text-white' data-name=" +
			cartArray[i].name +
			">x</button></div></div>";
	}
	$(".show-cart").html(output);
	$("#total-cart").val(shoppingCart.totalCart());
	$(".total-count").html(shoppingCart.totalCount());
}

// Delete item button

$(".show-cart").on("click", ".delete-item", function (event) {
	var name = $(this).data("name");
	console.log($(this).data("name"));
	shoppingCart.removeItemFromCartAll(name);
	displayCart();
});

// -1
$(".show-cart").on("click", ".minus-item", function (event) {
	var name = $(this).data("name");
	shoppingCart.removeItemFromCart(name);
	displayCart();
});
// +1
$(".show-cart").on("click", ".plus-item", function (event) {
	var name = $(this).data("name");
	shoppingCart.addItemToCart(name);
	displayCart();
});

// Item count input
$(".show-cart").on("change", ".item-count", function (event) {
	var name = $(this).data("name");
	var count = Number($(this).val());
	shoppingCart.setCountForItem(name, count);
	displayCart();
});

displayCart();
