@if(session()->has('message'))
    <x-common.alert.message-dismissible
        :alert="session('alert')"
        :message="session('message')"
    />
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <x-common.alert.message-dismissible
            alert="danger"
            :message="$error"
        />
    @endforeach
@endif
