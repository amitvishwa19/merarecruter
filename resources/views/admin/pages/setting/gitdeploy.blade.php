<div class="mg-b-10">
    <h5><b>Github Deploy</b></h5>
</div>

<div>

    <form method="POST" action="{{route('setting.store',['type'=>'github'])}}">
        @csrf

        <div class="col-12 col-xs-12">

            <!-- app_name Field -->
            <div class="form-group row">
                <label for="app_name" class="col-2 control-label text-right">Github Deploy Secret</label>
                <div class="col-10">
                   <input class="form-control  input-xs" name="github_secret" type="text" value="{{setting('app.autogitdeploykey')}}{{old('github_secret')}}">
                   <div class="form-text text-muted">
                         Github Secret as set to Github Webhook
                   </div>
                </div>
            </div>

            <!-- Allow user to register -->
            <div class="form-group row">
                <label for="app_name" class="col-2 control-label text-right">Auto Deploy from GitHub</label>
                <div class="col-10">
                   <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="autodeploy" class="custom-control-input" id="customCheck1" {{setting('app.autogitdeploy') == 'true' ? 'checked' : null}}>
                      <label class="custom-control-label" for="customCheck1">This will allow user to register to manage Admin</label>
                   </div>
                </div>
            </div>

            <button class="btn btn-primary btn-xs">Save</button>
            <a href="{{route('git.deploy',['type'=>'github'])}}" class="btn btn-dark btn-xs">Deploy From Github Manually</a>


        </div>

    </form>



</div>
