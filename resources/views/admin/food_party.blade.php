<x-admin_panel>

        <h4 class="d-block text-center mt-4">لیست فود پارتی ها</h4>

        <div class="row mt-4">
            <div class="col-10 mx-auto mt-3">


                <table class="table ">
                    <thead>

                      <tr class="text-center">

                        <th scope="col">شماره ردیف</th>

                        <th scope="col">تاریخ برگزاری</th>

                        <th scope="col">تاریخ پایان</th>

                        <th scope="col">وضعیت</th>

                        <th scope="col">ویرایش</th>

                        <th scope="col">حذف</th>

                      </tr>

                    </thead>


                    

                    <tbody>

                      @foreach ($parties as $party)
                          
                      
                      <tr class="text-center">


                          <th scope="row">
                              {{$loop->iteration}}
                          </th>

                          <td>{{$party->begin_at}}</td>

                          <td>{{$party->end_at}}</td>

                          <td>
                        
                                <span>{{($party->is_active) ? "فعال" : "غیرفعال"}}</span>
                                
                          <td>

                              <button class="btn btn-table bg-light-blue "  data-bs-toggle="modal" data-bs-target="#editModal-{{$party->id}}">
                                  <i class="fa-regular fa-pen-to-square text-light"></i>
                              </button>

                          </td>

                          <td>
                              <form method="POST" action="/admin/foodParty/{{$party->id}}">
                                
                                @csrf
                                
                                @method("DELETE")

                                <button class="btn btn-table bg-light-red ">
                                    <i class="fa-solid fa-trash  text-light"></i>
                                </button>

                              </form>
                          </td>

                        {{--START-MODAL-PARTY--}}

                        <div class="modal fade" id="editModal-{{$party->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title w-100 text-center" id="exampleModalLabel"> ویرایش غذا</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>


                              <form action="/admin/foodParty/{{$party->id}}" method="POST">
                                  @csrf
                                  @method("PUT")
                                  <div class="modal-body">
                                    
                                          <div class="mb-3">

                                            <label for="exampleInputEmail1" class="form-label w-100 text-right">وضعیت</label>

                                            <select name="status" class="form-select" aria-label="Default select example">
                                            
                                                <option value="1">فعال</option>
                                                
                                                <option value="0">غیرفعال</option>
                                    
                                              </select>

                                        </div>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                                    <button type="submit" class="btn btn-primary">به روز رسانی</button>
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>

                        {{-- END-MODAL-PARTY --}}
                      </tr>

                      @endforeach

                    </tbody>
                  </table>


                
                  </table>


            </div>
        </div>



         <div class="add-item-heaeder pointer" data-bs-toggle="modal" data-bs-target="#food_party_modal"> 

            ایجاد فودپارتی

            <i class="fa-solid fa-plus"></i>

         </div>

         {{-- ADD-Food_PARTY-MODAL --}}
       
         <div class="modal fade" id="food_party_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="text-center w-100" id="exampleModalLabel"> فود پارتی</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <form method="POST" action="/admin/foodParty" >
    
                  @csrf
                  
                    <div class="modal-body">
                
                            <div class="mb-3">
                                
                              <label for="exampleInputEmail1" class="form-label w-100 text-right">تاریخ آغاز</label>
            
                              <input type="datetime-local" name="beginDate" id="beginDate" class="form-control example1" aria-describedby="emailHelp">
                         
                              <div id="error-beginDate" class="text-center form-text text-danger"></div>

                            </div>

                            <div class="mb-3">

                              <label for="exampleInputEmail1" class="form-label w-100 text-right">تاریخ پایان</label>
    
                              <input type="datetime-local" name="endDate" id="endDate" class="form-control" aria-describedby="emailHelp">
                              
                              <div id="error-endDate" class="text-center form-text text-danger"></div>
                              <div id="error-logical" class="text-center form-text text-danger"></div>

                            </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                      <button  onclick="createParty()" type="button" class="btn btn-primary">اضفه کردن</button>
                    </div>
    
    
                </form>
    
    
              </div>
            </div>
         </div>


         <script>


          function createParty(){
  
              var beginDate = document.querySelector("#beginDate").value
  
              var naendDateme = document.querySelector("#endDate").value

              var xhr = new XMLHttpRequest();
  
              var formData = new FormData()
  
              formData.append("beginDate" ,  beginDate)
              formData.append("endDate" ,    naendDateme)
              formData.append("_token" , ' {{ csrf_token() }}')
             
              xhr.onreadystatechange = function() {
  
                      if (this.readyState == 4 ) 
                       {
           
                          message = JSON.parse(this.responseText)
                    

                          if(message.success)
                          {
                              window.location.replace("/admin/foodParty");
                          }
                        
                          for(var item in message.errors)
                          {
                              
                              document.querySelector("#error-"+item).innerHTML =  message.errors[item]
                          
                          }
                    
                        }
  
                  }
                  
  
               xhr.open('POST', '/admin/foodParty', true);
  
               xhr.setRequestHeader('Accept', 'application/json');
                  
               xhr.send(formData);
  
  
          }
  
      </script>
    
          {{-- END-Food_PARTY-MODAL --}}
          

</x-admin_panel>