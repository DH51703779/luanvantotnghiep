@extends('bacsi.bacsi_layout')
@section('bacsi_content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="row container d-flex justify-content-center">
    <div class="col-md-12">
        <div class="card card-bordered">
            <div class="card-header">
                <h4 class="card-title"><strong></strong></h4> <a class="btn btn-xs btn-secondary" href="#" data-abc="true">Let's Chat App</a>
            </div>
            <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:500px !important;">
                <div class="nhan">
                    <p>Hello</p>
                </div>
                <div class="nhan">
                    <p>Hellooooooooooooooooooooooooo</p>
                </div>
                <div class="gui">
                    <p>Hello</p>
                    <i>Đã xem</i> 

                </div>
                <div class="nhan">
                    <p>ádddddddddddddddddddddddddddddddđ</p>
                </div>
                <div class="gui">
                    <p>Nguyễn Thanh Ngân học sinh lớp 12C1 </p>
                </div>
                <div class="gui">
                    <p>Hello</p>
                </div>
                <div class="nhan">
                    <p>ádddddddddddddddddddddddddddddddđ</p>
                </div>
                <div class="nhan">
                    <p>Hello</p>
                </div>
                <div class="nhan">
                    <p>Hellooooooooooooooooooooooooo</p>
                </div>
                <div class="gui">
                    <p>Hello</p>
                </div>
                <div class="nhan">
                    <p>ádddddddddddddddddddddddddddddddđ</p>
                </div>
                <div class="gui">
                    <p>Nguyễn Thanh Ngân học sinh lớp 12C1 </p>
                </div>
                <div class="gui">
                    <p>Hello</p>
                </div>
                <div class="nhan">
                    <p>ádddddddddddddddddddddddddddddddđ</p>
                </div>

                <di v class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                    <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
            </div>
        </div>
        <div class="publisher bt-1 border-light">
            <div class="col-9">
                <div class="input-field m-t-0 m-b-0">
                    <textarea id="text" placeholder="Nhập tin nhắn" class="form-control"></textarea>
                    <input id="NN" type="hidden" value="">
                </div>
            </div>
            <div class="col-2">
                <a class="btn-circle btn-lg btn-cyan float-right text-white" id="send"><i class="fas fa-paper-plane"></i></a>
            </div>
        </div>
    </div>
</div>


@endsection
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        load_mess();

        setInterval(function() {
            load_mess()
        }, 2000);
        $('#send').click(function() {

            var element = document.getElementById('chat-content');
            element.scrollTop = element.scrollHeight - element.clientHeight;
        });

        function load_mess() {

            var id = $('#NN').val();

            $.ajax({
                url: 'load/' + id,
                method: "GET",
                success: function(data) {
                    data = JSON.parse(data);
                    var resultajax = ``;
                    console.log(data);
                    $('#form').show();

                    if (data.length > 0) {
                        for (let i = 0; i < data.length; i++) {
                            if (data[i].Magui == id) {
                                resultajax += ` <li class="chat-item">
                                  
                                  <div class="chat-content">
                                      
                                      <div class="box bg-light-info">` + data[i].noidung + `</div>
                                  </div>
                                
                              </li>`
                            } else {
                                resultajax += ` <li class="odd chat-item">
                                            <div class="chat-content">
                                                <div class="box bg-light-inverse">` + data[i].noidung + `</div>
                                                <br>
                                            </div>
                                        </li>`
                            }
                        }
                    }
                    $('#form').html(resultajax);

                }
            });

        };


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#send').click(function() {
            var id = $('#text').val();

            $.ajax({
                url: 'send',
                method: "POST",
                data: {
                    text: $('#text').val(),
                    NN: $('#NN').val()
                },
                success: function(response) {

                    load_mess();
                    $('#text').val('');


                }
            })
        })
    });
</script>




<style>
    .nhan {
        padding-left: 2rem;
        width: 60%;
        margin-top: 5px;
        -webkit-box-flex: initial;
        display: table;

    }

    .nhan p {
        border-radius: 20px !important;
        -moz-border-radius: 20px !important;
        -webkit-border-radius: 20px !important;
        border: none;
        background-color: #E6E6FA;
        padding: 0.5rem;
        width: fit-content;
        padding-left: 1rem;
        font-weight: 500;

    }

    .gui {
        margin-top: 5px;
        padding-right: 2rem;
        padding-left: 64px;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: reverse;
        flex-direction: row-reverse;
        width: 100%;
        -webkit-box-flex: initial;
        flex: initial;
        display: table;
    }

    .gui p {
        padding-right: 1rem;
        background-color: #007FFF;
        width: fit-content;
        padding: 0.5rem;
        border-radius: 20px !important;
        -moz-border-radius: 20px !important;
        -webkit-border-radius: 20px !important;
        border: none;
        float: right !important;
        font-weight: 500;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

    }
    .gui i{
        padding-right: 1rem;
        font-size: 10px;
        width: fit-content;
        padding: 0.5rem;
        border-radius: 20px !important;
        -moz-border-radius: 20px !important;
        -webkit-border-radius: 20px !important;
        border: none;
        float: right !important;
        font-weight: 500;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .card-bordered {
        border: 1px solid black;
    }



    .padding {
        padding: 3rem !important;
        padding-left: 10rem !important;
        padding-right: 5rem !important;

    }




    .card-header {
        display: -webkit-box;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        align-items: center;
        padding: 15px 20px;

        border-bottom: 1px solid rgba(77, 82, 89, 0.07)
    }


    .card-title {
        font-family: Roboto, sans-serif;
        font-weight: 300;
        line-height: 1.5;
        margin-bottom: 0;
        padding: 15px 20px;
        border-bottom: 1px solid rgba(77, 82, 89, 0.07)
    }


    .ps-container {
        -ms-touch-action: auto;
        touch-action: auto;
        overflow: hidden !important;
        -ms-overflow-style: none
    }


    .border-light {
        border-color: #f1f2f3 !important
    }

    .bt-1 {
        border-top: 1px solid #ebebeb !important
    }

    .publisher {
        position: relative;
        display: -webkit-box;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        padding: 12px 20px;
        background-color: #f9fafb
    }


    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: Roboto, sans-serif;
        font-weight: 300
    }
</style>