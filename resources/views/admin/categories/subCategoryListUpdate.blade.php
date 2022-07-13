<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    @if($category->category_name != $subcategory->category_name )
        <option value="{{$subcategory->category_name}}" @if($category->parent_id == $subcategory->category_name ) selected @endif >
            {{$dash}}{{$subcategory->category_name}}
        </option>
    @endif
    @if(count($subcategory->subcategory))
        @include('admin.categories.subCategoryListUpdate',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach
