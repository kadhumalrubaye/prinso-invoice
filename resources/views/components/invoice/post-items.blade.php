      <!-- post items  1-->

      <table class="table  table-bordered " id="item-form">


          <tbody>
              <tr>
                  <th id="item_id" scope="row">0</th>
                  <td>
                      <div class="form-group">

                          <input type="text" name="items[0][item_name]" class="form-control  " id="itemName_0" aria-describedby="itemName" placeholder="اسم المنتج">
                          <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                  </td>

                  <td>
                      <div class="form-group">

                          <input type="number" name="items[0][quantity]" class="form-control itemQuantity" id="itemQuantity_0" aria-describedby="emailHelp" placeholder="الكمية" onblur="quantityVspriceVsoriginalPrice()">
                          <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                  </td>
                  <th scope="row">
                      <div class="form-group">

                          <input type="number" name="items[0][original_price]" class="form-control itemCostPrice" id="itemOrginalPrice_0" aria-describedby="emailHelp" placeholder="السعر الكلفة">
                          <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                  </th>
                  <!-- <th scope="row">
                          total origianl
                      </th> -->
                  <td>
                      <div class="form-group">

                          <input type="number" name="items[0][price]" class="form-control itemPrice" id="itemPrice_0" aria-describedby="emailHelp" placeholder="سعر البيع">
                          <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                  </td>
                  <!-- <td>
                          total price
                      </td> -->
                  <td>
                      <div id="removeItemBtn" class="btn btn-primary remove-item" ">حذف</div>
                  </td>




              </tr>


          </tbody>
          <tfoot>
              <tr>


              </tr>
          </tfoot>
      </table>