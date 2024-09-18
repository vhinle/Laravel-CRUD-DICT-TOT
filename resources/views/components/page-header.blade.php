<div {{ $attributes->merge(['class' => 'row wrapper border-bottom page-heading']) }}>
    <div class="col-sm-4">
        <h2>{{ $pageTitle }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">This is</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Breadcrumb</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <x-action-button caption="{{ $btnCaption }}" />
        </div>
    </div>
</div>
