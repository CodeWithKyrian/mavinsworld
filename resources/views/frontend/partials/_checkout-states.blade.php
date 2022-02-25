<select onchange="setShippingCosts(this)" name="state_id" id="state-select" class="form-control select-active" required>
    <option value="">Select state...</option>
    @foreach ($states as $state)
        <option value="{{ $state->id }}">{{ $state->name }}</option>
    @endforeach
</select>

<script>
    $(".select-active").select2();
</script>
