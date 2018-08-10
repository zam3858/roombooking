						<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" value="{{ old('name') }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                            <div class="col-md-6">
                                <input id="level" type="text" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}"
                                       name="level" value="{{ old('level') }}" required >

                                @if ($errors->has('level'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                            <div class="col-md-6">
                                <select name="user_id" class="form-control" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach 
                                </select>

                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        
                        <div class="form-group row">
                            <label for="kegunaan_id" class="col-md-4 col-form-label text-md-right">{{ __('Kegunaan') }}</label>

                            <div class="col-md-6">
                                <select name="kegunaan_id" class="form-control" >
                                    <option value=""> Please Select One ...</option>
                                    @foreach($kegunaans as $kegunaan)
                                        <option value="{{ $kegunaan->id }}">
                                            {{ $kegunaan->name }}
                                        </option>
                                    @endforeach 
                                </select>

                                @if ($errors->has('kegunaan_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kegunaan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>