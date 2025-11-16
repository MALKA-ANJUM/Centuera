@extends('admin.layouts.layout')
@section('title', 'Manage Banners')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 mb-2">
                <h2 class="content-header-title float-start mb-0 uppercase">Manage Banners</h2>
            </div>
        </div>
        <div class="content-body">
            <div class="card w-100">
                <div class="card-body">
                    <form id="banner-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.banner.update') }}">
                        @csrf
                        <div id="banner-wrapper">
                            <div class="row banner-row mb-1">
                                <div class="col-md-5">
                                    <label class="form-label">Title</label>
                                    <textarea name="title[]" class="form-control ck-editor" placeholder="Enter title"></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Short Title</label>
                                    <textarea name="short_title[]" class="form-control ck-editor" placeholder="Enter short description"></textarea>
                                </div>
                                 <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger remove-banner">X</button>
                                </div>
                                <div class="col-md-5 mt-1">
                                    <label class="form-label">Description</label>
                                    <textarea name="description[]" class="form-control ck-editor" placeholder="Enter description"></textarea>
                                </div>
                                <div class="col-md-5 mt-1">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image[]" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-banner" class="btn btn-secondary">+ Add More</button>
                        <button type="submit" class="btn btn-primary">Save Banners</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h3>Existing Banners</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Short Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td><img src="{{ asset('admin/banner_img/'.$banner->image) }}" width="150"></td>
                                    <td>{!! $banner->title !!}</td>
                                    <td>{!! $banner->short_title !!}</td>
                                    <td>{!! $banner->description !!}</td>
                                    <td>
                                        <form action="{{ route('admin.banner.delete', $banner->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CKEditor 5 Classic build (CDN: latest) --}}
<script src="https://cdn.ckeditor.com/ckeditor5/latest/classic/ckeditor.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // map of editor instances by textarea id
    const editors = {};

    // assign unique id if missing and create editor
    function createEditorForTextarea(textarea) {
        if (!textarea) return Promise.resolve();
        if (!textarea.id) textarea.id = 'ck-' + Math.random().toString(36).substr(2, 9);

        // avoid double init
        if (editors[textarea.id]) return Promise.resolve(editors[textarea.id]);

        return ClassicEditor
            .create(textarea, {
                // put any CKEditor5 config here if needed
                toolbar: {
                    items: [
                        'bold','italic','link','bulletedList','numberedList','blockQuote','undo','redo'
                    ]
                },
                height: 150
            })
            .then(editor => {
                editors[textarea.id] = editor;
                return editor;
            })
            .catch(err => {
                console.error('CKEditor init error for', textarea, err);
            });
    }

    // init editors for all existing textareas with .ck-editor
    function initAllEditors() {
        const textareas = document.querySelectorAll('.ck-editor');
        const promises = [];
        textareas.forEach(t => {
            promises.push(createEditorForTextarea(t));
        });
        return Promise.all(promises);
    }

    // destroy an editor instance if exists
    function destroyEditorForTextarea(textarea) {
        if (!textarea || !textarea.id) return Promise.resolve();
        const id = textarea.id;
        const editor = editors[id];
        if (!editor) return Promise.resolve();
        return editor.destroy().then(() => {
            delete editors[id];
        }).catch(err => {
            console.warn('Error destroying editor', id, err);
        });
    }

    // copy editor data back to <textarea> before submit
    function syncEditorsToTextareas() {
        Object.keys(editors).forEach(id => {
            const editor = editors[id];
            const ta = document.getElementById(id);
            if (editor && ta) {
                ta.value = editor.getData();
            }
        });
    }

    // initialize existing editors
    initAllEditors();

    // track banner rows count for unique ids
    let bannerIndex = document.querySelectorAll('.banner-row').length || 1;

    // add new row handler
    document.getElementById('add-banner').addEventListener('click', function() {
        const wrapper = document.getElementById('banner-wrapper');
        const idx = bannerIndex++;

        // create unique ids for each textarea in the new row
        const titleId = `editor-title-${idx}`;
        const shortId = `editor-short-${idx}`;
        const descId = `editor-desc-${idx}`;

        const newRow = document.createElement('div');
        newRow.classList.add('row', 'banner-row', 'mb-1');
        newRow.innerHTML = `
            <div class="col-md-5">
                <label class="form-label">Title</label>
                <textarea id="${titleId}" name="title[]" class="form-control ck-editor" placeholder="Enter title"></textarea>
            </div>
            <div class="col-md-5">
                <label class="form-label">Short Title</label>
                <textarea id="${shortId}" name="short_title[]" class="form-control ck-editor" placeholder="Enter short description"></textarea>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-banner">X</button>
            </div>
            <div class="col-md-5 mt-1">
                <label class="form-label">Description</label>
                <textarea id="${descId}" name="description[]" class="form-control ck-editor" placeholder="Enter description"></textarea>
            </div>
            <div class="col-md-5 mt-1">
                <label class="form-label">Banner Image</label>
                <input type="file" name="image[]" class="form-control">
            </div>
        `;
        wrapper.appendChild(newRow);

        // initialize editors only for the newly added textareas
        createEditorForTextarea(document.getElementById(titleId));
        createEditorForTextarea(document.getElementById(shortId));
        createEditorForTextarea(document.getElementById(descId));
    });

    // remove banner row - destroy editors inside first
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-banner')) {
            const row = e.target.closest('.banner-row');
            if (!row) return;

            // find any .ck-editor inside row and destroy corresponding editors
            const tas = row.querySelectorAll('.ck-editor');
            const destroyPromises = Array.from(tas).map(ta => destroyEditorForTextarea(ta));
            Promise.all(destroyPromises).then(() => {
                row.remove();
            });
        }
    });

    // sync editors to textareas before form submit
    const form = document.getElementById('banner-form');
    form.addEventListener('submit', function(e) {
        syncEditorsToTextareas();
        // allow submit to continue
    });
});
</script>
@endsection
