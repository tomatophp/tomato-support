<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Question')}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.questions.store')}}" method="post">

          <x-splade-select :label="__('Category')" :placeholder="__('Category')" name="type_id" remote-url="/admin/types/api?for=faq&type=category" remote-root="data" option-label="name.{{app()->getLocale()}}" option-value="id" choices/>

        <div class="grid grid-cols-2 gap-4">
            <x-splade-input name="qa.ar" :label="__('Qa [AR]')" :placeholder="__('Qa [AR]')" />
            <x-splade-input name="qa.en" :label="__('Qa [EN]')" :placeholder="__('Qa [EN]')" />
        </div>
        <x-splade-textarea name="answer.ar" :label="__('Answer [AR]')" :placeholder="__('Answer [AR]')" />
        <x-splade-textarea name="answer.en" :label="__('Answer [EN]')" :placeholder="__('Answer [EN]')" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.questions.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
