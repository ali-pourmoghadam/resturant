
<x-manager_panel>


    <h4 class="d-block text-center mt-4"> جدول  مدیریت نظرات </h4>
    
    <div class="row mt-4">
        <div class="col-10 mx-auto mt-3">


            <table class="table ">
                <thead>

                  <tr class="text-center">

                    <th scope="col">شماره ردیف</th>

                    <th scope="col">نام فرستنده</th>

                    <th scope="col">وضعیت</th>

                    <th scope="col">مشاهده</th>

                    <th scope="col">درخواست حذف</th>

                    <th scope="col">تایید</th>

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


                            @empty(!$comment->managerComment)

                                <div class="d-block mt-2 px-2">
                                    
                                        <span class="d-block text-right px-1">

                                            : پاسخ های شما

                                        </span>
                                    
                                    @foreach ($comment->managerComment as $managerComment)

                                       <p class="text-center position-relative">
                                          {{$managerComment->message}}

                                          <form  action="/manager/comment/{{$managerComment->id}}" method="post">

                                            @method("DELETE")

                                            @csrf

                                              <button class="btn-close mx-2 position-absolute" style="left:50px; font-size: 10px"></button> 
                                          </form>
                                       </p>

                                    @endforeach

                                </div>

                            @endempty

                        </div>

                        <div class="input-group mt-2 w-100">

                            <form method="post" action="/manager/comment">
                                @csrf
                                <button type="submit" class="input-group-text" id="basic-addon1">
    
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                                    <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"></path>
                                  </svg>
    
                                </button>
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <input type="text" name="message" dir="rtl" class="form-control" placeholder="پاسخ خود را وارد کنید" aria-label="Input group example" aria-describedby="basic-addon1">
                            </form>
                        </div>

                    </x-modal>
                    
                    <td>
                
                        <form method="POST" action="/manager/comment/user/delete/{{$comment->id}}">

                            @csrf

                            @method("DELETE")
                            
                            <button class="btn btn-table bg-light-red">
    
                                <i class="fa-solid fa-trash  text-light"></i>
    
                            </button>

                        </form>

                    </td>

                    <td>
                        
                      <form method="POST" action="comment/user/confirm/{{$comment->id}}">
                        
                        @csrf

                        <button class="btn btn-table bg-light-green ">
                            <i class="fa-sharp fa-solid fa-check text-light"></i>
                        </button>

                      </form>

                    </td>

                    
          
                  </tr>

                  @endforeach



                </tbody>


              </table>


        </div>
    </div>

</x-manager_panel>