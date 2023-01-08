import './bootstrap';

import 'laravel-datatables-vite';
import Alpine from 'alpinejs';
import $ from 'jquery';
import { random } from 'lodash';


import 'jquery-ui/ui/widgets/datepicker';

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
jQuery(function () {
    var counter = 0;
    $('#duplicateItemForm').on({
        click: function () {
            counter++;

            $("<table>").addClass('table table-bordered').append(
                $('<tbody>').append(
                    $('<tr>').append(
                        $('<td>').append(
                            $('<th>').addClass('scope="col" item_id ').attr({

                                type: 'text',

                                id: counter
                            }).text(counter)

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
                            $('<input>').addClass('form-control itemPrice').attr({
                                placeholder: "سعر البيع ",
                                type: 'number',
                                name: `items[${counter}][price]`,
                                id: 'itemPrice_' + counter
                            })

                        ),
                        $('<td>').append(
                            $('<div>').addClass('btn btn-primary ').attr({

                                type: 'button',

                                id: "removeItemBtn",
                            }).text("حذف")
                                .on({

                                    click: function () {


                                        this.closest("table").remove();
                                    }
                                },)

                        ),
                    )
                )
            ).attr({
                id: `item-table-${counter}`
            }).appendTo('#table-container');

        }
    }


    );
});

//datetimve picker
$(function () {
    var dateFormat = "mm/dd/yy",
        from = $("#datetimepicker")
            .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3
            })
            .on("change", function () {
                to.datepicker("option", "minDate", getDate(this));
            }),
        to = $("#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3
        })
            .on("change", function () {
                from.datepicker("option", "maxDate", getDate(this));
            });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }
});






//---
$(document).on("click", '.remove-item', function () {
    $("#removeItemBtn").closest("#item-form").remove();

});

$(document).jquery(
    $("#invoiceTotalPrice").on({
        focus: function () {

            console.log('ok');
            let itemQuantites = $('#table-container :input#itemQuantity_0');

            let itemPrices = $('input.itemPrice');

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




