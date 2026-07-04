@extends('layout')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Add New Product</h1>
            <p class="text-slate-500 text-sm mt-1">Fill in the details to create a new product entry.</p>
        </div>
        <a href="{{ route('products.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-600 font-medium hover:bg-slate-200 transition-colors flex items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-100 text-rose-700 shadow-sm animate-fade-in">
            <div class="flex items-center gap-2 font-bold mb-2">
                <i class="fa-solid fa-triangle-exclamation"></i> Please fix the following errors:
            </div>
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="glass-card rounded-2xl p-6 sm:p-8 border border-white/60 shadow-xl shadow-slate-200/50 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-secondary"></div>
        
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Product Name</label>
                    <input type="text" name="pro_name" value="{{ old('pro_name') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder-slate-400" placeholder="e.g. MacBook Pro M3">
                </div>
                
                <!-- Category -->
                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Category</label>
                    <input type="text" name="category" value="{{ old('category') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder-slate-400" placeholder="e.g. Electronics">
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Price ($)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full pl-8 pr-4 py-2.5 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder-slate-400" placeholder="0.00">
                    </div>
                </div>

                <!-- Quantity -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Stock Quantity</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-boxes-stacked"></i>
                        </div>
                        <input type="number" name="qty" value="{{ old('qty') }}" class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder-slate-400" placeholder="0">
                    </div>
                </div>

                <!-- Image -->
                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Product Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-xl bg-slate-50/50 hover:bg-slate-50 transition-colors group relative cursor-pointer overflow-hidden">
                        <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" id="file-upload">
                        <div class="space-y-2 text-center relative z-0">
                            <div class="mx-auto h-12 w-12 text-slate-300 group-hover:text-primary transition-colors flex items-center justify-center rounded-full bg-white shadow-sm border border-slate-100">
                                <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                            </div>
                            <div class="text-sm text-slate-600">
                                <span class="font-medium text-primary hover:text-indigo-500">Click to upload</span> or drag and drop
                            </div>
                            <p class="text-xs text-slate-500">PNG, JPG, GIF up to 2MB</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-4 flex flex-col-reverse sm:flex-row justify-end gap-3">
                <a href="{{ route('products.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-medium hover:bg-slate-50 transition-colors text-center">Cancel</a>
                <button type="submit" class="btn-primary px-8 py-2.5 rounded-xl font-medium shadow-lg shadow-indigo-200 flex justify-center items-center gap-2">
                    <i class="fa-solid fa-check"></i> Save Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
