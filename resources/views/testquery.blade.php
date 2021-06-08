 <select class="form-control" name="product_id">

                <option>Select Product</option>

                @foreach ($items as $key => $value)
                <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>