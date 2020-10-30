@foreach ($products as $product)
<div class="modal" id="delete-product-{{ $product->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف منتج</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف {{ $product->name }} ؟</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
                    <button class="btn ripple btn-danger" type="submit">حذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach