<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">



            <div class="modal-header loginheader" style="margin-top: 22px">
                <h3>LOGIN</h3>

            </div>

            <div class="modal-body loginformarea">
                {{-- <form>  --}}
                @if ($message = Session::get('login_error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form role="form" method="post" action="{{ action('User\UserController@user_login') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email" required />
                        <small id="emailHelp" class="form-text text-muted"> We ll
                            never
                            share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password" required />
                    </div>
                    {{-- <div class="form-group form-check">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                                        <label class="form-check-label saveu" for="exampleCheck1" style="margin-left: 20px
                                                        ;">Save User</label>
                                                        <a href="#"><span class="forspan">Forget Password</span></a>
                                                    </div>  --}}
                    <button type="submit" class="btn btn-primary logclic">
                        Login
                    </button>
                </form>
                <div class="form-group form-check">
                    {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                                    <label class="form-check-label saveu" for="exampleCheck1" style="margin-left: 20px
                                                    ;">Save User</label>  --}}
                    <a href="#"><span class="forspan">Forget Password</span></a>
                    {{-- <button type="submit" class="btn btn-primary forspan">
                                                        Login
                                                    </button>  --}}
                </div>
            </div>
        </div>
    </div>
</div>


<li id="45">
    <div class="infobox visible-xs">
        <div class="infoboximg"></div>
        <div class="infoboxdata">
            <a href="registrationform.html"><button type="button"
                    class="btn btn-primary logclick">
                    Registration
                </button></a>

            <button type="button" class="btn btn-primary logclick"
                data-toggle="modal" data-target="#exampleModal">
                Login
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header loginheader">
                            <h3>LOGIN</h3>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                               </button> -->
                        </div>
                        <div class="modal-body loginformarea">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control"
                                        id="exampleInputEmail1"
                                        aria-describedby="emailHelp"
                                        placeholder="Enter email" />
                                    <small id="emailHelp"
                                        class="form-text text-muted">We'll never
                                        share your email with anyone
                                        else.</small>
                                </div>
                                <div class="form-group">
                                    <label
                                        for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control"
                                        id="exampleInputPassword1"
                                        placeholder="Password" />
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox"
                                        class="form-check-input"
                                        id="exampleCheck1" />
                                    <label class="form-check-label saveu"
                                        for="exampleCheck1">Save User</label>
                                    <a href="#"><span class="forspan">Forget
                                            Password</span></a>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary logclic">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
