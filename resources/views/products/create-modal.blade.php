<div class="modal" id="add-product">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">إضافة منتج جديد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">إسم المنتج <small class="text-danger">(مطلوب)</small></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="إسم المنتج" value="{{ old('name') }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="section_id">القسم <small class="text-danger">(مطلوب)</small></label>
                        <select class="form-control" name="section_id" id="section_id">
                            <option selected disabled>اختر القسم</option>
                            @foreach ($sections as $section)
                            <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : null }}>{{ $section->name }}</option>
                            @endforeach
                        </select>
                        @error('section_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">وصف المنتج</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="وصف المنتج">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
                    <button class="btn ripple btn-primary" type="submit">إضافة</button>
                </div>
            </form>
        </div>
    </div>
</div>