<!-- Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalTitle"
style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x close" data-dismiss="modal">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
            <div class="compose-box">
                <div class="compose-content" id="addTaskModalTitle">
                    <h5 class="">Add Task</h5>
                    <form>
                        <div class="
                        row">
                        <div class="col-md-12">
                            <div class="d-flex mail-to mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-edit-3 flaticon-notes">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                    </path>
                                </svg>
                                <div class="w-100">
                                    <input id="task" type="text" placeholder="Task" class="form-control"
                                        name="task">
                                    <span class="validation-text"></span>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="d-flex  mail-subject mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-file-text flaticon-menu-list">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    <div class="w-100">
                        <div class="ql-toolbar ql-snow"><span class="ql-formats"><span
                                    class="ql-header ql-picker"><span class="ql-picker-label" tabindex="0"
                                        role="button" aria-expanded="false"
                                        aria-controls="ql-picker-options-0"><svg viewBox="0 0 18 18">
                                            <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11">
                                            </polygon>
                                            <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7">
                                            </polygon>
                                        </svg></span><span class="ql-picker-options" aria-hidden="true"
                                        tabindex="-1" id="ql-picker-options-0"><span tabindex="0"
                                            role="button" class="ql-picker-item" data-value="1"></span><span
                                            tabindex="0" role="button" class="ql-picker-item"
                                            data-value="2"></span><span tabindex="0" role="button"
                                            class="ql-picker-item"></span></span></span><select
                                    class="ql-header" style="display: none;">
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option selected="selected"></option>
                                </select></span><span class="ql-formats"><button type="button"
                                    class="ql-bold"><svg viewBox="0 0 18 18">
                                        <path class="ql-stroke"
                                            d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z">
                                        </path>
                                        <path class="ql-stroke"
                                            d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z">
                                        </path>
                                    </svg></button><button type="button" class="ql-italic"><svg
                                        viewBox="0 0 18 18">
                                        <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line>
                                        <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line>
                                        <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line>
                                    </svg></button><button type="button" class="ql-underline"><svg
                                        viewBox="0 0 18 18">
                                        <path class="ql-stroke"
                                            d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3">
                                        </path>
                                        <rect class="ql-fill" height="1" rx="0.5" ry="0.5"
                                            width="12" x="3" y="15"></rect>
                                    </svg></button></span><span class="ql-formats"><button
                                    type="button" class="ql-image"><svg viewBox="0 0 18 18">
                                        <rect class="ql-stroke" height="10" width="12" x="3" y="4">
                                        </rect>
                                        <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                                        <polyline class="ql-even ql-fill"
                                            points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                                    </svg></button><button type="button" class="ql-code-block"><svg
                                        viewBox="0 0 18 18">
                                        <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11">
                                        </polyline>
                                        <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11">
                                        </polyline>
                                        <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line>
                                    </svg></button></span></div>
                        <div class="ql-toolbar ql-snow"><span class="ql-formats"><span
                                    class="ql-header ql-picker"><span class="ql-picker-label" tabindex="0"
                                        role="button" aria-expanded="false"
                                        aria-controls="ql-picker-options-0"><svg viewBox="0 0 18 18">
                                            <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11">
                                            </polygon>
                                            <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7">
                                            </polygon>
                                        </svg></span><span class="ql-picker-options" aria-hidden="true"
                                        tabindex="-1" id="ql-picker-options-0"><span tabindex="0"
                                            role="button" class="ql-picker-item"
                                            data-value="1"></span><span tabindex="0" role="button"
                                            class="ql-picker-item" data-value="2"></span><span tabindex="0"
                                            role="button"
                                            class="ql-picker-item"></span></span></span><select
                                    class="ql-header" style="display: none;">
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option selected="selected"></option>
                                </select></span><span class="ql-formats"><button type="button"
                                    class="ql-bold"><svg viewBox="0 0 18 18">
                                        <path class="ql-stroke"
                                            d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z">
                                        </path>
                                        <path class="ql-stroke"
                                            d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z">
                                        </path>
                                    </svg></button><button type="button" class="ql-italic"><svg
                                        viewBox="0 0 18 18">
                                        <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line>
                                        <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line>
                                        <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line>
                                    </svg></button><button type="button" class="ql-underline"><svg
                                        viewBox="0 0 18 18">
                                        <path class="ql-stroke"
                                            d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3">
                                        </path>
                                        <rect class="ql-fill" height="1" rx="0.5" ry="0.5"
                                            width="12" x="3" y="15"></rect>
                                    </svg></button></span><span class="ql-formats"><button
                                    type="button" class="ql-image"><svg viewBox="0 0 18 18">
                                        <rect class="ql-stroke" height="10" width="12" x="3" y="4">
                                        </rect>
                                        <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                                        <polyline class="ql-even ql-fill"
                                            points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                                    </svg></button><button type="button" class="ql-code-block"><svg
                                        viewBox="0 0 18 18">
                                        <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11">
                                        </polyline>
                                        <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11">
                                        </polyline>
                                        <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line>
                                    </svg></button></span></div>
                        <div id="taskdescription" class="ql-container ql-snow">
                            <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true"
                                data-placeholder="Compose an epic...">
                                <p><br></p>
                            </div>
                            <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                            <div class="ql-tooltip ql-hidden"><a class="ql-preview" target="_blank"
                                    href="about:blank"></a><input type="text" data-formula="e=mc^2"
                                    data-link="https://quilljs.com" data-video="Embed URL"><a
                                    class="ql-action"></a><a class="ql-remove"></a></div>
                        </div>
                        <span class="validation-text"></span>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
            Discard</button>
        <button class="btn add-tsk" style="">Add Task</button>
        <button class="btn edit-tsk" style="display: none;">Save</button>
    </div>
</div>
</div>