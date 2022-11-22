{{-- SIDEBAR JS --}}
<script src="{{ URL::to('/js/sidebar.js') }}"></script>

{{-- TOASTR JS --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

{{-- AUTONUMERIC JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.6.0/autoNumeric.min.js"
integrity="sha512-6j+LxzZ7EO1Kr7H5yfJ8VYCVZufCBMNFhSMMzb2JRhlwQ/Ri7Zv8VfJ7YI//cg9H5uXT2lQpb14YMvqUAdGlcg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    option = {
        digitGroupSeparator: '.',
        decimalCharacter: ',',
        maximumValue: 1000000000,
        minimumValue: 0
    };
    new AutoNumeric.multiple('.autoamount', option);
</script>


