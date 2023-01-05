import './bootstrap';

import 'laravel-datatables-vite';
import Alpine from 'alpinejs';
import $ from 'jquery';


window.Alpine = Alpine;

Alpine.start();





function getTotalPrice() {
    console.log('getTotalPrice');
    let itemPriceInput = document.querySelectorAll("itemPrice");
    let itemPriceInputValue = 0;
    console.log(itemPriceInput);
    itemPriceInput.forEach(element => {
        console.log(element);
        itemPriceInputValue = itemPriceInputValue + element.value;
    });
    //
    let itemQuantityInput = document.querySelectorAll("itemPrice");
    let itemQuantityVlaue = 0;
    itemQuantityInput.array.forEach(element => {
        console.log(element.value);
        itemQuantityVlaue = element.value + itemQuantityVlaue;
    });
    //
    console.log('total price for each item');
    //
    let totalPrice = itemPriceInputValue * itemQuantityVlaue;
    //
    console.log("totalPrice");
    console.log(totalPrice);
    // orignal price
    let itemOrginalPriceInput = document.getElementById("itemOrginalPrice");
    console.log(itemPriceInput);
    console.log(itemOrginalPriceInput);
    //total price
    let invoiceTotalPrice = document.getElementById("invoiceTotalPrice");
    invoiceTotalPrice.value = totalPrice;

}



//duplicate item form
$(document).ready(function () {
    var counter = 0;
    $('#duplicateItemForm').click(function () {

        counter++;

        $("<table>").addClass('table table-bordered').append(
            $('<tbody>').append(
                $('<tr>').append(
                    $('<td>').append(
                        $('<th>').addClass('scope="col" ').attr({

                            type: 'text',

                            id: 'itemName_' + counter
                        }).text(counter + 1)

                    ),
                    $('<td>').append(
                        $('<input>').addClass('form-control').attr({
                            placeholder: "اسم المنتج",
                            type: 'text',
                            name: `items[${counter}][item_name]`,
                            id: 'itemName_' + counter
                        })

                    ),
                    $('<td>').append(
                        $('<input>').addClass('form-control').attr({
                            placeholder: " الكمية",
                            type: 'number',
                            name: `items[${counter}][quantity]`,
                            id: 'itemQuantity_' + counter
                        })

                    ),
                    $('<td>').append(
                        $('<input>').addClass('form-control').attr({
                            placeholder: "السعر الاصلي ",
                            type: 'number',
                            name: `items[${counter}][original_price]`,
                            id: 'itemOrginalPrice_' + counter
                        })

                    ),
                    $('<td>').append(
                        $('<input>').addClass('form-control').attr({
                            placeholder: "سعر البيع ",
                            type: 'number',
                            name: `items[${counter}][price]`,
                            id: 'itemPrice_' + counter
                        })

                    ),
                    $('<td>').append(
                        $('<div>').addClass('btn btn-primary ').attr({

                            type: 'button',

                            id: counter
                        }).text("حذف").on({
                            click: function () { $(`#item-table-${this.id}`).remove(); }
                        },)

                    ),
                )
            )
        ).attr({
            id: `item-table-${counter}`
        }).appendTo('#table-container');


    });
});





$(document).jquery(
    $("#invoiceTotalPrice").on({
        focus: function () {

            console.log('ok');
            let itemQuantites = $('#table-container :input#itemQuantity');

            let itemPrices = $('#table-container :input#itemPrice');

            var totalPrices = 0;
            itemPrices.each(function () {
                let price = $(this).val();
                if (!price) {

                    price = 0;

                }
                price = parseInt(price);
                totalPrices = totalPrices + price;
                console.log(totalPrices);
            });

            $("#invoiceTotalPrice").val(totalPrices);
            console.log(totalPrices);

            let itemOrginalPrices = $('#table-container :input#itemOrginalPrice');


        },
    })

);




