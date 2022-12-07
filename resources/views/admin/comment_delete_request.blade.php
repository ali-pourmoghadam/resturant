<x-admin_panel>


    <h4 class="d-block text-center mt-4"> درخواست های حذف </h4>
    
    <div class="row mt-4">
        <div class="col-10 mx-auto mt-3">


            <table class="table ">
                <thead>

                  <tr class="text-center">

                    <th scope="col">شماره ردیف</th>

                    <th scope="col">نام فرستنده</th>

                    <th scope="col">وضعیت</th>

                    <th scope="col">مشاهده</th>

                    <th scope="col">حذف</th>

                    <th scope="col">برگرداندن</th>

                  </tr>

                </thead>


                <tbody>

                  @foreach ($comments as $comment)
                      
                  
                  <tr class="text-center">


                    <th scope="row">
                        {{$loop->iteration}}
                    </th>

                    <td>
                        {{$comment->order->user->email}}
                    </td>

                    <td>
                      {{$comment->status}}
                    </td>
                          
                    <td>
                        <button class="btn btn-table bg-light-blue "  data-bs-toggle="modal" data-bs-target="#showModal-{{$comment->id}}">
                            <i class="fa-sharp fa-solid fa-eye text-light"></i>
                        </button>
                    </td>

                    <x-modal idx="showModal-{{$comment->id}}" title="نمایش کامنت">
                    
                        <div class="d-block px-2 mb-4 text-center">

                            {{$comment->message}}

                        </div>

                    </x-modal>
                    
                    <td>
                        
                        <form method="POST" action="/admin/comment/deletes/force/{{$comment->id}}">

                            @csrf

                            @method("DELETE")
                            
                            <button class="btn btn-table bg-light-red">
    
                                <i class="fa-solid fa-trash  text-light"></i>
    
                            </button>

                        </form>

                    </td>

                    <td>
                        
                      <form method="POST" action="/admin/comment/deletes/restore/{{$comment->id}}">
                        
                        @csrf

                        <button class="btn btn-table bg-light-green ">
                            <i class="fa-solid fa-trash-arrow-up text-light"></i>
                        </button>

                      </form>

                    </td>

                    
          
                  </tr>

                  @endforeach



                </tbody>


              </table>


        </div>
    </div>

</x-admin_panel>