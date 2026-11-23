<center>
    @if (session()->has('success'))
        <div class="alert success text-center">
            <p class="inner">{{ session()->get('success') }}</p>
        </div>
    @endif

    @if (session()->has('failure'))
        <div class="alert error text-center">
            <p class="inner">{{ session()->get('failure') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert error text-center">
            <p class="inner">Please correct the fields marked below.</p>
        </div>
    @endif
</center>
