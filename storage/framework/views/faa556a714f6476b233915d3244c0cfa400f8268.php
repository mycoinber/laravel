<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>

<div class="tab-pane mt-3 fade" id="features" role="tabpanel" aria-labelledby="features-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="/admin/settings/features" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="page" value="general">
                <input type="hidden" name="features" value="features">

                <div class="mb-5">
                    <h5><?php echo e(trans('update.agora')); ?> <?php echo e(trans('admin/main.settings')); ?></h5>

                    <div class="form-group">
                        <label><?php echo e(trans('update.agora')); ?> <?php echo e(trans('update.resolution')); ?></label>

                        <select class="form-control" name="value[agora_resolution]">
                            <option value=""><?php echo e(trans('admin/main.select')); ?> <?php echo e(trans('update.resolution')); ?></option>

                            <?php $__currentLoopData = getAgoraResolutions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resolution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($resolution); ?>" <?php echo e(((!empty($itemValue) and !empty($itemValue['agora_resolution']) and $itemValue['agora_resolution'] == $resolution) or old('value[agora_resolution]') == $resolution) ? 'selected' : ''); ?>><?php echo e(str_replace('_',' x ', $resolution)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('update.max_bitrate')); ?></label>
                        <input type="text" name="value[agora_max_bitrate]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['agora_max_bitrate'])) ? $itemValue['agora_max_bitrate'] : old('agora_max_bitrate')); ?>" class="form-control "/>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('update.min_bitrate')); ?></label>
                        <input type="text" name="value[agora_min_bitrate]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['agora_min_bitrate'])) ? $itemValue['agora_min_bitrate'] : old('agora_min_bitrate')); ?>" class="form-control "/>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('update.frame_rate')); ?></label>
                        <input type="text" name="value[agora_frame_rate]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['agora_frame_rate'])) ? $itemValue['agora_frame_rate'] : old('agora_frame_rate')); ?>" class="form-control "/>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[agora_live_streaming]" value="0">
                            <input type="checkbox" name="value[agora_live_streaming]" id="agoraStreamSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['agora_live_streaming']) and $itemValue['agora_live_streaming']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="agoraStreamSwitch"><?php echo e(trans('update.agora_live_streaming')); ?></label>
                        </label>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[agora_chat]" value="0">
                            <input type="checkbox" name="value[agora_chat]" id="agoraChatSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['agora_chat']) and $itemValue['agora_chat']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="agoraChatSwitch"><?php echo e(trans('update.agora_chat')); ?></label>
                        </label>
                    </div>
                    

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[agora_in_free_courses]" value="0">
                            <input type="checkbox" name="value[agora_in_free_courses]" id="agoraInFreeCoursesSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['agora_in_free_courses']) and $itemValue['agora_in_free_courses']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="agoraInFreeCoursesSwitch"><?php echo e(trans('update.agora_in_free_courses')); ?></label>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.new_interactive_file')); ?> <?php echo e(trans('admin/main.settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[new_interactive_file]" value="0">
                            <input type="checkbox" name="value[new_interactive_file]" id="newInteractiveFileSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['new_interactive_file']) and $itemValue['new_interactive_file']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="newInteractiveFileSwitch"><?php echo e(trans('update.interactive_feature_toggle')); ?></label>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.timezone')); ?> <?php echo e(trans('admin/main.settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[timezone_in_register]" value="0">
                            <input type="checkbox" name="value[timezone_in_register]" id="timezoneInRegisterSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['timezone_in_register']) and $itemValue['timezone_in_register']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="timezoneInRegisterSwitch"><?php echo e(trans('update.timezone_in_register')); ?></label>
                        </label>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[timezone_in_create_webinar]" value="0">
                            <input type="checkbox" name="value[timezone_in_create_webinar]" id="timezoneInCreateWebinarSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['timezone_in_create_webinar']) and $itemValue['timezone_in_create_webinar']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="timezoneInCreateWebinarSwitch"><?php echo e(trans('update.timezone_in_create_webinar')); ?></label>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.sequence_content_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[sequence_content_status]" value="0">
                            <input type="checkbox" name="value[sequence_content_status]" id="sequenceContentSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['sequence_content_status']) and $itemValue['sequence_content_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="sequenceContentSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                    </div>
                </div>


                <div class="mb-5">
                    <h5><?php echo e(trans('update.assignment_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[webinar_assignment_status]" value="0">
                            <input type="checkbox" name="value[webinar_assignment_status]" id="webinarAssignmentSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['webinar_assignment_status']) and $itemValue['webinar_assignment_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="webinarAssignmentSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.private_content_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[webinar_private_content_status]" value="0">
                            <input type="checkbox" name="value[webinar_private_content_status]" id="webinarPrivateContentSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['webinar_private_content_status']) and $itemValue['webinar_private_content_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="webinarPrivateContentSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.private_content_settings_hint')); ?></p>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[disable_view_content_after_user_register]" value="0">
                            <input type="checkbox" name="value[disable_view_content_after_user_register]" id="disableViewContentAfterUserRegisterSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['disable_view_content_after_user_register']) and $itemValue['disable_view_content_after_user_register']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="disableViewContentAfterUserRegisterSwitch"><?php echo e(trans('update.disable_view_content_after_user_register')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.disable_view_content_after_user_register_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.course_forum_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[course_forum_status]" value="0">
                            <input type="checkbox" name="value[course_forum_status]" id="courseForumSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['course_forum_status']) and $itemValue['course_forum_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="courseForumSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.course_forum_settings_status_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.forum_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[forums_status]" value="0">
                            <input type="checkbox" name="value[forums_status]" id="forumStatusSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['forums_status']) and $itemValue['forums_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="forumStatusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.forum_settings_status_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.direct_classes_payment_button_settings')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[direct_classes_payment_button_status]" value="0">
                            <input type="checkbox" name="value[direct_classes_payment_button_status]" id="directClassesPaymentButtonStatusSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['direct_classes_payment_button_status']) and $itemValue['direct_classes_payment_button_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="directClassesPaymentButtonStatusSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>

                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.direct_classes_payment_button_status_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.cookie_settings_status')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[cookie_settings_status]" value="0">
                            <input type="checkbox" name="value[cookie_settings_status]" id="cookieSettingsSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['cookie_settings_status']) and $itemValue['cookie_settings_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="cookieSettingsSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.mobile_app_status')); ?></h5>

                    <div class="form-group mt-3 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[mobile_app_status]" value="0">
                            <input type="checkbox" name="value[mobile_app_status]" id="mobileAppSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['mobile_app_status']) and $itemValue['mobile_app_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="mobileAppSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                        <p class="font-12 text-gray mb-0"><?php echo e(trans('update.mobile_app_only_hint')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.extra_time_to_join')); ?></h5>

                    <div class="form-group mt-3 mb-0 custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[extra_time_to_join_status]" value="0">
                            <input type="checkbox" name="value[extra_time_to_join_status]" id="extraTimeToJoinSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['extra_time_to_join_status']) and $itemValue['extra_time_to_join_status']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="extraTimeToJoinSwitch"><?php echo e(trans('admin/main.active')); ?></label>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="input-label" for=""><?php echo e(trans('update.default_time')); ?></label>
                        <input type="text" name="value[extra_time_to_join_default_value]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['extra_time_to_join_default_value'])) ? $itemValue['extra_time_to_join_default_value'] : ''); ?>" class="form-control"/>
                    </div>
                    <p class="font-12 text-gray mb-0"><?php echo e(trans('update.extra_time_hint')); ?></p>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.registration_form_options')); ?></h5>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[show_other_register_method]" value="0">
                            <input type="checkbox" name="value[show_other_register_method]" id="showOtherRegisterMethodSwitch" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['show_other_register_method']) and $itemValue['show_other_register_method']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="showOtherRegisterMethodSwitch"><?php echo e(trans('update.show_other_register_method')); ?></label>
                        </label>
                        <p class="font-14"><?php echo e(trans('update.show_other_register_method_hint')); ?></p>
                    </div>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[show_certificate_additional_in_register]" value="0">
                            <input type="checkbox" name="value[show_certificate_additional_in_register]" id="showCertificateAdditionalInRegister" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['show_certificate_additional_in_register']) and $itemValue['show_certificate_additional_in_register']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="showCertificateAdditionalInRegister"><?php echo e(trans('update.show_certificate_additional_in_register')); ?></label>
                        </label>
                        <p class="font-14"><?php echo e(trans('update.show_certificate_additional_in_register_hint')); ?></p>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/as453212/ed-libary.online/www/resources/views/admin/settings/general/features.blade.php ENDPATH**/ ?>