<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Your Store</a>

            <div class="modal-button ml-30">
            <button class="navbar-toggler" type="button" data-toggle="modal"
                    data-target="#myModal" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Меню</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color: transparent; color: black; border: none;">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body" id="modalContent">
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active" aria-current="page" href="#" data-toggle="dropdown" href="{{url('item')}}">Товары</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{url('item')}}">Все товары</a></li>
                                        <li><a class="dropdown-item" href="{{url('item/create')}}">Добавить товар</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Заказы</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Покупатели</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            @if(!Auth::user())
                <form class="d-flex mr-auto mb-0" method="post" action="{{url('auth')}}" class="needs-validation" novalidate> <!-- отключение браузерной валидации -->
                    @csrf
                    <input type="text" class="form-control form-control-sm" placeholder="Введите email" id="email" name="email" value="{{ old('email') }}">
                    <input type="password" class="form-control form-control-sm" placeholder="Введите пароль" id="password" name="password" value="{{ old('password') }}">
                    <button type="submit" class="btn btn-outline-success">Войти</button>
                </form>
            @else
                <ul class="navbar-nav ml-10">
                    <a class="nav-link active" href="#"> <i class="fa fa-user" style="font-size: 20px;color: #483D8B"></i>
                        <span> </span>{{Auth::user()->name}}</a>
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('logout')}}">Выйти</a>
                </ul>
            @endif

        </div>
    </nav>
</header>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


