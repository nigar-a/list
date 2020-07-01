{{--
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: http://www.bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
--}}
@extends('layouts.master')

<?php
// Category
if ($post->category) {
    if ($post->category->parent_id == 0) {
        $postCatParentId = $post->category->id;
    } else {
	    $postCatParentId = $post->category->parent_id;
	}
} else {
	$postCatParentId = 0;
}
?>
@section('content')
	@include('common.spacer')
	<div class="main-container">
		<div class="container">
			<div class="row">
				
				@include('post.inc.notification')

				<div class="col-md-9 page-content">
					<div class="inner-box category-content">
						<h2 class="title-2">
							<strong> <i class="icon-docs"></i> {{ t('Update My Ad') }}</strong> -&nbsp;
							<a href="{{ \App\Helpers\UrlGen::post($post) }}" class="tooltipHere" title="" data-placement="top"
								data-toggle="tooltip"
								data-original-title="{!! $post->title !!}">
								{!! \Illuminate\Support\Str::limit($post->title, 45) !!}
							</a>
						</h2>
						
						<div class="row">
							<div class="col-12">
								
								<form class="form-horizontal" id="postForm" method="POST" action="{{ url()->current() }}" enctype="multipart/form-data">
									{!! csrf_field() !!}
									<input name="_method" type="hidden" value="PUT">
									<input type="hidden" name="post_id" value="{{ $post->id }}">
									<fieldset>
										<!-- parent_id -->
										<?php $parentIdError = (isset($errors) and $errors->has('category_id')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label{{ $parentIdError }}">{{ t('Category') }} <sup>*</sup></label>
											<div class="col-md-8">
												<select name="parent_id" id="parentId" class="form-control selecter{{ $parentIdError }}">
													<option value="0" data-type=""
															@if (old('parent_id', $postCatParentId)=='' or old('parent_id', $postCatParentId)==0)
																selected="selected"
															@endif
													>
														{{ t('Select a category') }}
													</option>
													@foreach ($categories as $cat)
														<option value="{{ $cat->tid }}" data-type="{{ $cat->type }}"
																@if (old('parent_id', $postCatParentId)==$cat->tid)
																	selected="selected"
																@endif
														>
															{{ $cat->name }}
														</option>
													@endforeach
												</select>
												<?php
												$parentType = null;
												if (isset($post->category) && isset($post->category->type)) {
													$parentType = $post->category->type;
													if (isset($post->category->parent) && isset($post->category->parent->type) && !empty($post->category->parent->type)) {
														$parentType = $post->category->parent->type;
													}
												}
												?>
												<input type="hidden" name="parent_type" id="parentType" value="{{ old('parent_type', $parentType) }}">
											</div>
										</div>

										<!-- category_id -->
										<?php $categoryIdError = (isset($errors) and $errors->has('category_id')) ? ' is-invalid' : ''; ?>
										<div id="subCatBloc" class="form-group row required">
											<label class="col-md-3 col-form-label{{ $categoryIdError }}">{{ t('Sub-Category') }} <sup>*</sup></label>
											<div class="col-md-8">
												<select name="category_id" id="categoryId" class="form-control selecter{{ $categoryIdError }}">
													<option value="0" data-type=""
															@if (old('category_id', $post->category_id)=='' or old('category_id', $post->category_id)==0)
																selected="selected"
															@endif
													>
														{{ t('Select a sub-category') }}
													</option>
												</select>
												<input type="hidden" name="category_type" id="categoryType" value="{{ old('category_type') }}">
											</div>
										</div>

										<!-- post_type_id -->
										<?php $postTypeIdError = (isset($errors) and $errors->has('post_type_id')) ? ' is-invalid' : ''; ?>
										<div id="postTypeBloc" class="form-group row required">
											<label class="col-md-3 col-form-label">{{ t('Type') }} <sup>*</sup></label>
											<div class="col-md-8">
												@foreach ($postTypes as $postType)
													<div class="form-check form-check-inline">
														<input name="post_type_id"
															   id="postTypeId-{{ $postType->tid }}" value="{{ $postType->tid }}"
															   type="radio"
															   class="form-check-input{{ $postTypeIdError }}"
																{{ (old('post_type_id', $post->post_type_id)==$postType->tid) ? 'checked="checked"' : '' }}
														>
														<label class="form-check-label" for="postTypeId-{{ $postType->tid }}">
															{{ $postType->name }}
														</label>
													</div>
												@endforeach
											</div>
										</div>

										<!-- title -->
										<?php $titleError = (isset($errors) and $errors->has('title')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label" for="title">{{ t('Title') }} <sup>*</sup></label>
											<div class="col-md-8">
												<input id="title" name="title" placeholder="{{ t('Ad title') }}" class="form-control input-md{{ $titleError }}"
													   type="text" value="{{ old('title', $post->title) }}">
												<small id="" class="form-text text-muted">{{ t('A great title needs at least 60 characters.') }}</small>
											</div>
										</div>

										<!-- description -->
										<?php $descriptionError = (isset($errors) and $errors->has('description')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<?php
												$descriptionErrorLabel = '';
												$descriptionColClass = 'col-md-8';
												if (config('settings.single.wysiwyg_editor') != 'none') {
													$descriptionColClass = 'col-md-12';
													$descriptionErrorLabel = $descriptionError;
												} else {
													$post->description = strip_tags($post->description);
												}
											?>
											<label class="col-md-3 col-form-label{{ $descriptionErrorLabel }}" for="description">
												{{ t('Description') }} <sup>*</sup>
											</label>
											<div class="{{ $descriptionColClass }}">
												<textarea
														class="form-control{{ $descriptionError }}"
														id="description"
														name="description"
														rows="15"
												>{{ old('description', $post->description) }}</textarea>
												<small id="" class="form-text text-muted">{{ t('Describe what makes your ad unique') }}</small>
                                            </div>
										</div>
										
										
										@if (isset($picturesLimit) and is_numeric($picturesLimit) and $picturesLimit > 0)
											<!-- pictures -->
											<?php $picturesError = (isset($errors) and $errors->has('pictures')) ? ' is-invalid' : ''; ?>
											<div class="form-group row required" id="picturesBloc">
												<label class="col-md-3 col-form-label{{ $picturesError }}" for="pictures">
													{{ t('Pictures') }}
													@if (config('settings.single.picture_mandatory'))
														<sup>*</sup>
													@endif
												</label>
												<div class="col-md-8">
													@if (isset($post->pictures) and $post->pictures->count() > 0)
														@for($i = 0; $i <= $picturesLimit-1; $i++)
															<div class="mb-2 <?php echo ($errors->has('pictures.'.$i)) ? 'is-invalid' : ''; ?>">
																<div class="file-loading">
																	<?php $picId = (isset($post->pictures->get($i)->id)) ? $post->pictures->get($i)->id : $i; ?>
																	<input id="picture{{ $i }}"
																		   name="pictures[{{ $picId }}]"
																		   type="file"
																		   class="file post-picture"
																		   accept="image/*"
																		   data-msg-placeholder="{{ t('Picture #:number', ['number' => $i+1]) }}"
																	>
																</div>
															</div>
														@endfor
													@else
														@for($i = 0; $i <= $picturesLimit-1; $i++)
															<div class="mb-2 <?php echo ($errors->has('pictures.'.$i)) ? 'is-invalid' : ''; ?>">
																<div class="file-loading">
																	<input id="picture{{ $i }}"
																		   name="pictures[]"
																		   type="file"
																		   class="file post-picture"
																		   accept="image/*"
																		   data-msg-placeholder="{{ t('Picture #:number', ['number' => $i+1]) }}"
																	>
																</div>
															</div>
														@endfor
													@endif
													<small id="" class="form-text text-muted">
														{{ t('Add up to :pictures_number pictures. Use real pictures of your product, not catalogs.', [
															'pictures_number' => $picturesLimit
															]) }}
													</small>
												</div>
											</div>
										@endif
										
										
										<!-- customFields -->
										<div id="customFields"></div>

										<!-- price -->
										<?php $priceError = (isset($errors) and $errors->has('price')) ? ' is-invalid' : ''; ?>
										<div id="priceBloc" class="form-group row required">
											<label class="col-md-3 col-form-label" for="price">{{ t('Price') }}</label>
											<div class="input-group col-md-8">
												<div class="input-group-prepend">
													<span class="input-group-text">{!! config('currency')['symbol'] !!}</span>
												</div>
												
												<input id="price"
													   name="price"
													   class="form-control{{ $priceError }}"
													   placeholder="{{ t('e.i. 15000') }}"
													   type="text"
													   value="{{ old('price', $post->price) }}"
												>
												
												<div class="input-group-append">
													<span class="input-group-text">
														<input id="negotiable" name="negotiable" type="checkbox"
															   value="1" {{ (old('negotiable', $post->negotiable)=='1') ? 'checked="checked"' : '' }}>
														&nbsp;<small>{{ t('Negotiable') }}</small>
													</span>
												</div>
											</div>
										</div>
										
										<!-- country_code -->
										<input id="countryCode" name="country_code" type="hidden" value="{{ !empty($post->country_code) ? $post->country_code : config('country.code') }}">
									
										@if (config('country.admin_field_active') == 1 and in_array(config('country.admin_type'), ['1', '2']))
											<!-- admin_code -->
											<?php $adminCodeError = (isset($errors) and $errors->has('admin_code')) ? ' is-invalid' : ''; ?>
											<div id="locationBox" class="form-group row required">
												<label class="col-md-3 col-form-label{{ $adminCodeError }}" for="admin_code">{{ t('Location') }} <sup>*</sup></label>
												<div class="col-md-8">
													<select id="adminCode" name="admin_code" class="form-control sselecter{{ $adminCodeError }}">
														<option value="0" {{ (!old('admin_code') or old('admin_code')==0) ? 'selected="selected"' : '' }}>
															{{ t('Select your Location') }}
														</option>
													</select>
												</div>
											</div>
										@endif
									
										<!-- city_id -->
										<?php $cityIdError = (isset($errors) and $errors->has('city_id')) ? ' is-invalid' : ''; ?>
										<div id="cityBox" class="form-group row required">
											<label class="col-md-3 col-form-label{{ $cityIdError }}" for="city_id">{{ t('City') }} <sup>*</sup></label>
											<div class="col-md-8">
												<select id="cityId" name="city_id" class="form-control sselecter{{ $cityIdError }}">
													<option value="0" {{ (!old('city_id') or old('city_id')==0) ? 'selected="selected"' : '' }}>
														{{ t('Select a city') }}
													</option>
												</select>
											</div>
										</div>
										
										<!-- tags -->
										<?php $tagsError = (isset($errors) and $errors->has('tags')) ? ' is-invalid' : ''; ?>
										<div class="form-group row">
											<label class="col-md-3 col-form-label" for="tags">{{ t('Tags') }}</label>
											<div class="col-md-8">
												<input id="tags"
													   name="tags"
													   placeholder="{{ t('Tags') }}"
													   class="form-control input-md{{ $tagsError }}"
													   type="text"
													   value="{{ old('tags', $post->tags) }}"
												>
												<small id="" class="form-text text-muted">{{ t('Enter the tags separated by commas.') }}</small>
											</div>
										</div>


										<div class="content-subheading">
											<i class="icon-user fa"></i>
											<strong>{{ t('Seller information') }}</strong>
										</div>
										
										
										<!-- contact_name -->
										<?php $contactNameError = (isset($errors) and $errors->has('contact_name')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label" for="contact_name">{{ t('Your name') }} <sup>*</sup></label>
											<div class="col-md-8">
												<input id="contact_name" name="contact_name" placeholder="{{ t('Your name') }}"
													   class="form-control input-md{{ $contactNameError }}" type="text"
													   value="{{ old('contact_name', $post->contact_name) }}">
											</div>
										</div>

										<!-- email -->
										<?php $emailError = (isset($errors) and $errors->has('email')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label" for="email"> {{ t('Email') }} </label>
											<div class="input-group col-md-8">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="icon-mail"></i></span>
												</div>
												
												<input id="email" name="email" class="form-control{{ $emailError }}"
													   placeholder="{{ t('Email') }}" type="text"
													   value="{{ old('email', $post->email) }}">
											</div>
										</div>

										<!-- phone -->
										<?php $phoneError = (isset($errors) and $errors->has('phone')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label" for="phone">{{ t('Phone Number') }}</label>
											<div class="input-group col-md-8">
												<div class="input-group-prepend">
													<span id="phoneCountry" class="input-group-text">{!! getPhoneIcon($post->country_code) !!}</span>
												</div>
												
												<input id="phone" name="phone"
													   placeholder="{{ t('Phone Number') }}" class="form-control input-md{{ $phoneError }}"
													   type="text" value="{{ phoneFormat(old('phone', $post->phone), $post->country_code) }}"
												>
												
												<div class="input-group-append">
													<span class="input-group-text">
														<input name="phone_hidden" id="phoneHidden" type="checkbox"
															   value="1" {{ (old('phone_hidden', $post->phone_hidden)=='1') ? 'checked="checked"' : '' }}>
														&nbsp;<small>{{ t('Hide') }}</small>
													</span>
												</div>
											</div>
										</div>
									
										@include('post.createOrEdit.singleStep.inc.packages')

										<!-- Button  -->
										<div class="form-group row pt-3">
											<div class="col-md-12 text-center">
												<a href="{{ \App\Helpers\UrlGen::post($post) }}" class="btn btn-default btn-lg"> {{ t('Back') }}</a>
												<button id="submitPostForm" class="btn btn-primary btn-lg"> {{ t('Update') }} </button>
											</div>
										</div>

									</fieldset>
								</form>
								
							</div>
						</div>
					</div>
				</div>
				<!-- /.page-content -->

				<div class="col-md-3 reg-sidebar">
					<div class="reg-sidebar-inner text-center">
						
						@if (auth()->check())
							@if (auth()->user()->id == $post->user_id)
								<div class="card sidebar-card panel-contact-seller">
									<div class="card-header">{{ t('Author\'s Actions') }}</div>
									<div class="card-content user-info">
										<div class="card-body text-center">
											<a href="{{ \App\Helpers\UrlGen::post($post) }}" class="btn btn-default btn-block">
												<i class="icon-right-hand"></i> {{ t('Return to the Ad') }}
											</a>
										</div>
									</div>
								</div>
							@endif
						@endif

						<div class="card sidebar-card">
							<div class="card-header">{{ t('How to sell quickly?') }}</div>
							<div class="card-content">
								<div class="card-body text-left">
									<ul class="list-check">
										<li> {{ t('Use a brief title and description of the item') }} </li>
										<li> {{ t('Make sure you post in the correct category') }}</li>
										<li> {{ t('Add nice photos to your ad') }}</li>
										<li> {{ t('Put a reasonable price') }}</li>
										<li> {{ t('Check the item before publish') }}</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('after_styles')
@endsection

@section('after_scripts')
@endsection

@include('post.createOrEdit.inc.form-plugins')
