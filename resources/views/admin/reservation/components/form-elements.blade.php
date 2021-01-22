<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.reservation.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('event_id'), 'has-success': fields.event_id && fields.event_id.valid }">
    <label for="event_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation.columns.event_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.event_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('event_id'), 'form-control-success': fields.event_id && fields.event_id.valid}" id="event_id" name="event_id" placeholder="{{ trans('admin.reservation.columns.event_id') }}">
        <div v-if="errors.has('event_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('event_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('seats'), 'has-success': fields.seats && fields.seats.valid }">
    <label for="seats" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation.columns.seats') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.seats" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('seats'), 'form-control-success': fields.seats && fields.seats.valid}" id="seats" name="seats" placeholder="{{ trans('admin.reservation.columns.seats') }}">
        <div v-if="errors.has('seats')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('seats') }}</div>
    </div>
</div>


