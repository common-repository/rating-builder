webpackJsonp([31],{473:function(e,n,o){"use strict";function t(e){return e&&e.__esModule?e:{default:e}}function r(e){var n=e.item,o=e.updateData,t=e.allFieldValue,r=e.allErrors,i=e.showError,s={updateData:o,item:n,allFieldValue:t,styles:c.default},A="";return r&&i&&(A=(0,l.ShowError)(n,r,i)),a.default.createElement(p.InputWrapper,{item:n},a.default.createElement(p.ElementHeader,n),a.default.createElement(u.default,s),A)}Object.defineProperty(n,"__esModule",{value:!0}),n.default=r;var i=o(1),a=t(i),s=o(765),u=t(s),l=o(169),p=o(168),A=o(839),c=t(A)},765:function(e,n,o){"use strict";function t(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(n,"__esModule",{value:!0}),n.default=void 0;var r=o(4),i=t(r),a=o(54),s=t(a),u=o(50),l=t(u),p=o(51),A=t(p),c=o(53),d=t(c),C=o(52),b=t(C),y=o(1),m=t(y);n.default=function(e){function n(e){(0,l.default)(this,n);var o=(0,d.default)(this,(n.__proto__||(0,s.default)(n)).call(this,e)),t=o.props,r=t.item,i=t.allFieldValue;o.update="true"===r.debounce?_.debounce(o.update,r.debounceTime):o.update.bind(o);var a=r.value?r.value:"";return{}.hasOwnProperty.call(i,r.id)&&"string"==typeof i[r.id]&&(a=i[r.id]),"child_id"in r&&{}.hasOwnProperty.call(i,r.child_id)&&(a=i[r.child_id]),o.state={value:a,enterEnable:"true"===r.enterEnable},o}return(0,b.default)(n,e),(0,A.default)(n,[{key:"update",value:function(e){var n=this.props;(0,n.updateData)(n.item,e)}},{key:"render",value:function(){var e=this,n=this.props,o=n.item,t=n.styles,r=this.state.value,a=this.state.enterEnable,s={id:o.id,className:t.reuseInputField+" reuseInputField___",value:r};return a&&(s.onKeyPress=function(n){"Enter"===n.key&&(n.preventDefault(),e.update(r))}),s.onChange=function(n){n.preventDefault(),r=n.target.value,e.setState({value:r}),a||e.update(r)},m.default.createElement("div",null,m.default.createElement("input",(0,i.default)({type:"text",placeholder:o.placeholder},s)),"true"===o.clearbutton&&null!==r&&""!==r?m.default.createElement("button",{className:t.reuseClearBtn+" reuseClearBtn___",onClick:function(){return e.update("")}}):null)}}]),n}(y.Component)},803:function(e,n,o){n=e.exports=o(433)(),n.push([e.i,'input[type=email].reuseInputField___76TPG,input[type=password].reuseInputField___76TPG,input[type=text].reuseInputField___76TPG{font-size:14px;font-weight:400;color:#737373;line-height:40px;height:42px;width:100%;display:block;padding:0 15px;border:1px solid #e3e3e3;overflow:hidden;background-color:#fff;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;-webkit-border-radius:5px;-moz-border-radius:5px;-o-border-radius:5px;border-radius:5px;outline:0!important;-webkit-transition:all .8s cubic-bezier(.28,.75,.25,1);-moz-transition:all .8s cubic-bezier(.28,.75,.25,1);-ms-transition:all .8s cubic-bezier(.28,.75,.25,1);-o-transition:all .8s cubic-bezier(.28,.75,.25,1);transition:all .8s cubic-bezier(.28,.75,.25,1)}@media only screen and (max-width:767px){input[type=email].reuseInputField___76TPG,input[type=password].reuseInputField___76TPG,input[type=text].reuseInputField___76TPG{width:100%}}@media only screen and (min-width:768px) and (max-width:991px){input[type=email].reuseInputField___76TPG,input[type=password].reuseInputField___76TPG,input[type=text].reuseInputField___76TPG{width:100%}}input[type=email].reuseInputField___76TPG:focus,input[type=password].reuseInputField___76TPG:focus,input[type=text].reuseInputField___76TPG:focus{border-color:#454545}input[type=email].reuseInputField___76TPG::-webkit-input-placeholder,input[type=password].reuseInputField___76TPG::-webkit-input-placeholder,input[type=text].reuseInputField___76TPG::-webkit-input-placeholder{opacity:1;color:#929292;-webkit-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}input[type=email].reuseInputField___76TPG:focus::-webkit-input-placeholder,input[type=password].reuseInputField___76TPG:focus::-webkit-input-placeholder,input[type=text].reuseInputField___76TPG:focus::-webkit-input-placeholder{opacity:0;-webkit-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}input[type=email].reuseInputField___76TPG:-moz-placeholder,input[type=password].reuseInputField___76TPG:-moz-placeholder,input[type=text].reuseInputField___76TPG:-moz-placeholder{opacity:1;color:#929292;-moz-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}input[type=email].reuseInputField___76TPG:focus:-moz-placeholder,input[type=password].reuseInputField___76TPG:focus:-moz-placeholder,input[type=text].reuseInputField___76TPG:focus:-moz-placeholder{opacity:0;-moz-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}input[type=email].reuseInputField___76TPG::-moz-placeholder,input[type=password].reuseInputField___76TPG::-moz-placeholder,input[type=text].reuseInputField___76TPG::-moz-placeholder{opacity:1;color:#929292;-moz-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}input[type=email].reuseInputField___76TPG:focus::-moz-placeholder,input[type=password].reuseInputField___76TPG:focus::-moz-placeholder,input[type=text].reuseInputField___76TPG:focus::-moz-placeholder{opacity:0;-moz-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}input[type=email].reuseInputField___76TPG:-ms-input-placeholder,input[type=password].reuseInputField___76TPG:-ms-input-placeholder,input[type=text].reuseInputField___76TPG:-ms-input-placeholder{opacity:1;color:#929292;-ms-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}input[type=email].reuseInputField___76TPG:focus:-ms-input-placeholder,input[type=password].reuseInputField___76TPG:focus:-ms-input-placeholder,input[type=text].reuseInputField___76TPG:focus:-ms-input-placeholder{opacity:0;-ms-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}.reuseArrowMove___2FUMa{width:42px;height:42px;display:inline-block;float:left;text-align:center;background-color:#454545;-webkit-border-radius:5px 0 0 5px;-moz-border-radius:5px 0 0 5px;-o-border-radius:5px 0 0 5px;border-radius:5px 0 0 5px;cursor:move;cursor:grab;cursor:-moz-grab;cursor:-webkit-grab;border:0;outline:0}.reuseArrowMove___2FUMa:active{cursor:grabbing;cursor:-moz-grabbing;cursor:-webkit-grabbing}.reuseArrowMove___2FUMa i{font-size:18px;color:#fff;line-height:42px}.reuseRepeatableTextbox___3D7J7 .reuseInputField___76TPG{width:calc(100% - 150px);float:left;border-left:0;border-right:0;-webkit-border-radius:0;-moz-border-radius:0;-o-border-radius:0;border-radius:0}.reuseRepeatableTextbox___3D7J7 .reuseInputField___76TPG:focus{border-color:#e3e3e3;background-color:#fff}.reuseRepeatableTextbox___3D7J7 .reuseInputField___76TPG::-webkit-input-placeholder{opacity:1;color:#929292;-webkit-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}.reuseRepeatableTextbox___3D7J7 .reuseInputField___76TPG:focus::-webkit-input-placeholder{opacity:0;-webkit-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}.reuseRepeatableTextbox___3D7J7 .reuseInputField___76TPG:-moz-placeholder{opacity:1;color:#929292;-moz-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}.reuseRepeatableTextbox___3D7J7 .reuseInputField___76TPG:focus:-moz-placeholder{opacity:0;-moz-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}.reuseRepeatableTextbox___3D7J7 .reuseInputField___76TPG::-moz-placeholder{opacity:1;color:#929292;-moz-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}.reuseRepeatableTextbox___3D7J7 .reuseInputField___76TPG:focus::-moz-placeholder{opacity:0;-moz-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}.reuseRepeatableTextbox___3D7J7 .reuseInputField___76TPG:-ms-input-placeholder{opacity:1;color:#929292;-ms-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}.reuseRepeatableTextbox___3D7J7 .reuseInputField___76TPG:focus:-ms-input-placeholder{opacity:0;-ms-transition:opacity .35s ease-in-out;transition:opacity .35s ease-in-out}.reuseRepeatableTextbox___3D7J7 .reuseArrowMove___2FUMa{width:42px;height:42px;display:inline-block;float:left;text-align:center;background-color:#454545;-webkit-border-radius:5px 0 0 5px;-moz-border-radius:5px 0 0 5px;-o-border-radius:5px 0 0 5px;border-radius:5px 0 0 5px;cursor:move;cursor:grab;cursor:-moz-grab;cursor:-webkit-grab;border:0;outline:0}.reuseRepeatableTextbox___3D7J7 .reuseArrowMove___2FUMa:active{cursor:grabbing;cursor:-moz-grabbing;cursor:-webkit-grabbing}.reuseRepeatableTextbox___3D7J7 .reuseArrowMove___2FUMa i{font-size:18px;color:#fff;line-height:42px}.reuseRepeatableTextbox___3D7J7 .reuseButton___3v9f3{padding:0;width:42px;text-align:center;display:inline-block;float:left;color:#fdfdfd;background-color:#4ac5b6;-webkit-border-radius:0 5px 5px 0;-moz-border-radius:0 5px 5px 0;-o-border-radius:0 5px 5px 0;border-radius:0 5px 5px 0;border:0;outline:0;height:42px;line-height:42px}.reuseRepeatableTextbox___3D7J7 .reuseButton___3v9f3 i{font-size:18px;margin-right:0}.reuseRepeatableTextbox___3D7J7 .reuseButton___3v9f3:hover{background-color:#35a799}.reuseRepeatableTextbox___3D7J7 .reuseButton___3v9f3.reuseDeleteButton___3Mfr_{background-color:#fc4a52}.reuseRepeatableTextbox___3D7J7 .reuseButton___3v9f3.reuseButtonDisable___2W4pC,.reuseRepeatableTextbox___3D7J7 .reuseButton___3v9f3.reuseButtonDisable___2W4pC:hover{background-color:#ddd}.reuseRepeatableTextbox___3D7J7.reuseSingleField___2cJ2a .reuseInputField___76TPG{width:100%;float:none;display:block;overflow:hidden;border:1px solid #e3e3e3;-webkit-transition:all .8s cubic-bezier(.28,.75,.25,1);-moz-transition:all .8s cubic-bezier(.28,.75,.25,1);-ms-transition:all .8s cubic-bezier(.28,.75,.25,1);-o-transition:all .8s cubic-bezier(.28,.75,.25,1);transition:all .8s cubic-bezier(.28,.75,.25,1)}.reuseRepeatableField___3PqlM{display:block;overflow:hidden;margin-bottom:15px}.reuseRepeatableField___3PqlM:last-child{margin-bottom:0}.reuseClearBtn___1Zo5E{width:30px;height:42px;display:inline-flex;align-items:center;justify-content:center;background:none;border:0;outline:0;position:absolute;right:0;bottom:0}.reuseClearBtn___1Zo5E:after{content:"\\F2D7";font-family:Ionicons;font-size:16px;color:#737373;line-height:1;-webkit-transition:all .35s ease;-moz-transition:all .35s ease;-ms-transition:all .35s ease;-o-transition:all .35s ease;transition:all .35s ease}',"",{version:3,sources:["/Applications/MAMP/htdocs/scholarify/wp-content/plugins/redq-reuse-form/assets/src/elements/re-textbox/textbox.less","/Applications/MAMP/htdocs/scholarify/wp-content/plugins/redq-reuse-form/assets/src/elements/less/base.less"],names:[],mappings:"AAKA,gIAGI,eACA,gBACA,cACA,iBACA,YACA,WACA,cACA,eACA,yBACA,gBACA,sBCyGF,wBACG,qBACK,gBAVR,0BACG,uBACE,qBACG,kBDjGN,oBCqFF,uDACG,oDACE,mDACG,kDACI,8CAAuB,CDvFjC,yCA0QJ,gIAzQQ,UAAA,CAAA,CAGJ,+DAsQJ,gIArQQ,UAAA,CAAA,CAGJ,kJACE,oBAAA,CAIF,iNACI,UACA,cACA,4CACA,mCAAA,CAEJ,mOACE,UACA,4CACA,mCAAA,CAIF,mLACI,UACA,cACA,yCACA,mCAAA,CAEJ,qMACE,UACA,yCACA,mCAAA,CAIF,sLACI,UACA,cACA,yCACA,mCAAA,CAEJ,wMACE,UACA,yCACA,mCAAA,CAIF,kMACI,UACA,cACA,wCACA,mCAAA,CAEJ,oNACE,UACA,wCACA,mCAAA,CAIN,wBACI,WACA,YACA,qBACA,WACA,kBACA,yBCqBF,kCACG,+BACE,6BACG,0BDtBN,YACA,YACA,iBACA,oBACA,SACA,SAAA,CAEA,+BACI,gBACA,qBACA,uBAAA,CAlBR,0BAsBQ,eACA,WACA,gBAAA,CAKR,yDAEQ,yBACA,WACA,cACA,eCPN,wBACG,qBACE,mBACG,eAAA,CDOF,+DACE,qBACA,qBAAA,CAIF,oFACI,UACA,cACA,4CACA,mCAAA,CAEJ,0FACE,UACA,4CACA,mCAAA,CAIF,0EACI,UACA,cACA,yCACA,mCAAA,CAEJ,gFACE,UACA,yCACA,mCAAA,CAIF,2EACI,UACA,cACA,yCACA,mCAAA,CAEJ,iFACE,UACA,yCACA,mCAAA,CAIF,+EACI,UACA,cACA,wCACA,mCAAA,CAEJ,qFACE,UACA,wCACA,mCAAA,CA9DV,wDAmEQ,WACA,YACA,qBACA,WACA,kBACA,yBC1EN,kCACG,+BACE,6BACG,0BDyEF,YACA,YACA,iBACA,oBACA,SACA,SAAA,CAEA,+DACI,gBACA,qBACA,uBAAA,CApFZ,0DAwFY,eACA,WACA,gBAAA,CA1FZ,qDA+FQ,UACA,WACA,kBACA,qBACA,WACA,cACA,yBCvGN,kCACG,+BACE,6BACG,0BDsGF,SACA,UACA,YACA,gBAAA,CA1GR,uDA6GY,eACA,cAAA,CAGJ,2DACI,wBAAA,CAGJ,+EACI,wBAAA,CAEJ,AAEG,sKACC,qBAAA,CAKR,kFAEQ,WACA,WACA,cACA,gBACA,yBCjJV,uDACG,oDACE,mDACG,kDACI,8CAAuB,CDkJrC,8BACE,cACA,gBACA,kBAAA,CAEA,yCACE,eAAA,CAKJ,uBACE,WACA,YACA,oBACA,mBACA,uBACA,gBACA,SACA,UACA,kBACA,QACA,QAAA,CAEA,6BACE,gBACA,qBACA,eACA,cACA,cC3LF,iCACG,8BACC,6BACC,4BACG,wBAAA,CAAA",file:"textbox.less",sourcesContent:['@import \'../less/base.less\';\n\n/*\nInput Field\n*/\ninput[type=text].reuseInputField,\ninput[type=email].reuseInputField,\ninput[type=password].reuseInputField{\n    font-size: @_reuse--FontSize;\n    font-weight: @_reuse--FontWeight-Regular;\n    color: @_reuse--Color-Black-737373;\n    line-height: 40px;\n    height: 42px;\n    width: 100%;\n    display: block;\n    padding: 0 15px;\n    border: 1px solid @_reuse--Color-Border-Color;\n    overflow: hidden;\n    background-color: #ffffff;\n    .reuse--DropShadow(none);\n    .reuse--BorderRadius(5px);\n    outline: 0 !important;\n    .reuse--Transition-BAZIAR;\n    @media @smartphone_port{\n        width: 100%;\n    }\n\n    @media @tablet_port{\n        width: 100%;\n    }\n\n    &:focus{\n      border-color: @_reuse--Color-Black-454545;\n    }\n\n    /* Place Holder CSS */\n    &::-webkit-input-placeholder {\n        opacity: 1;\n        color: @_reuse--Color-Black-737373Light;\n        -webkit-transition: opacity 0.35s ease-in-out;\n        transition: opacity 0.35s ease-in-out;\n    }\n    &:focus::-webkit-input-placeholder {\n      opacity: 0;\n      -webkit-transition: opacity 0.35s ease-in-out;\n      transition: opacity 0.35s ease-in-out;\n    }\n\n\n    &:-moz-placeholder {\n        opacity: 1;\n        color: @_reuse--Color-Black-737373Light;\n        -moz-transition: opacity 0.35s ease-in-out;\n        transition: opacity 0.35s ease-in-out;\n    }\n    &:focus:-moz-placeholder {\n      opacity: 0;\n      -moz-transition: opacity 0.35s ease-in-out;\n      transition: opacity 0.35s ease-in-out;\n    }\n\n\n    &::-moz-placeholder {\n        opacity: 1;\n        color: @_reuse--Color-Black-737373Light;\n        -moz-transition: opacity 0.35s ease-in-out;\n        transition: opacity 0.35s ease-in-out;\n    }\n    &:focus::-moz-placeholder {\n      opacity: 0;\n      -moz-transition: opacity 0.35s ease-in-out;\n      transition: opacity 0.35s ease-in-out;\n    }\n\n\n    &:-ms-input-placeholder {\n        opacity: 1;\n        color: @_reuse--Color-Black-737373Light;\n        -ms-transition: opacity 0.35s ease-in-out;\n        transition: opacity 0.35s ease-in-out;\n    }\n    &:focus:-ms-input-placeholder {\n      opacity: 0;\n      -ms-transition: opacity 0.35s ease-in-out;\n      transition: opacity 0.35s ease-in-out;\n    }\n}\n\n.reuseArrowMove{\n    width: 42px;\n    height: 42px;\n    display: inline-block;\n    float: left;\n    text-align: center;\n    background-color: @_reuse--Color-Black-454545;\n    .reuse--BorderRadius(5px 0 0 5px);\n    cursor: move;\n    cursor: grab;\n    cursor: -moz-grab;\n    cursor: -webkit-grab;\n    border: 0;\n    outline: 0;\n\n    &:active{\n        cursor: grabbing;\n        cursor: -moz-grabbing;\n        cursor: -webkit-grabbing;\n    }\n\n    i{\n        font-size: @_reuse--FontSize + 4;\n        color: @_reuse--Color-White;\n        line-height: 42px;\n    }\n}\n\n\n.reuseRepeatableTextbox{\n    .reuseInputField{\n        width: calc(~"100% - 150px");\n        float: left;\n        border-left: 0;\n        border-right: 0;\n        .reuse--BorderRadius(0);\n\n        &:focus{\n          border-color: @_reuse--Color-Border-Color;\n          background-color: #ffffff;\n        }\n\n        /* Place Holder CSS */\n        &::-webkit-input-placeholder {\n            opacity: 1;\n            color: @_reuse--Color-Black-737373Light;\n            -webkit-transition: opacity 0.35s ease-in-out;\n            transition: opacity 0.35s ease-in-out;\n        }\n        &:focus::-webkit-input-placeholder {\n          opacity: 0;\n          -webkit-transition: opacity 0.35s ease-in-out;\n          transition: opacity 0.35s ease-in-out;\n        }\n\n\n        &:-moz-placeholder {\n            opacity: 1;\n            color: @_reuse--Color-Black-737373Light;\n            -moz-transition: opacity 0.35s ease-in-out;\n            transition: opacity 0.35s ease-in-out;\n        }\n        &:focus:-moz-placeholder {\n          opacity: 0;\n          -moz-transition: opacity 0.35s ease-in-out;\n          transition: opacity 0.35s ease-in-out;\n        }\n\n\n        &::-moz-placeholder {\n            opacity: 1;\n            color: @_reuse--Color-Black-737373Light;\n            -moz-transition: opacity 0.35s ease-in-out;\n            transition: opacity 0.35s ease-in-out;\n        }\n        &:focus::-moz-placeholder {\n          opacity: 0;\n          -moz-transition: opacity 0.35s ease-in-out;\n          transition: opacity 0.35s ease-in-out;\n        }\n\n\n        &:-ms-input-placeholder {\n            opacity: 1;\n            color: @_reuse--Color-Black-737373Light;\n            -ms-transition: opacity 0.35s ease-in-out;\n            transition: opacity 0.35s ease-in-out;\n        }\n        &:focus:-ms-input-placeholder {\n          opacity: 0;\n          -ms-transition: opacity 0.35s ease-in-out;\n          transition: opacity 0.35s ease-in-out;\n        }\n    }\n\n    .reuseArrowMove{\n        width: 42px;\n        height: 42px;\n        display: inline-block;\n        float: left;\n        text-align: center;\n        background-color: @_reuse--Color-Black-454545;\n        .reuse--BorderRadius(5px 0 0 5px);\n        cursor: move;\n        cursor: grab;\n        cursor: -moz-grab;\n        cursor: -webkit-grab;\n        border: 0;\n        outline: 0;\n\n        &:active{\n            cursor: grabbing;\n            cursor: -moz-grabbing;\n            cursor: -webkit-grabbing;\n        }\n\n        i{\n            font-size: @_reuse--FontSize + 4;\n            color: @_reuse--Color-White;\n            line-height: 42px;\n        }\n    }\n\n    .reuseButton{\n        padding: 0;\n        width: 42px;\n        text-align: center;\n        display: inline-block;\n        float: left;\n        color: @_reuse--Color-Gray-FDFDFD;\n        background-color: @_reuse--Color-Green;\n        .reuse--BorderRadius(0 5px 5px 0);\n        border: 0;\n        outline: 0;\n        height: 42px;\n        line-height: 42px;\n\n        i{\n            font-size: @_reuse--FontSize + 4;\n            margin-right: 0;\n        }\n\n        &:hover{\n            background-color: darken(@_reuse--Color-Green, 10%);\n        }\n\n        &.reuseDeleteButton{\n            background-color: @_reuse--Color-Red;\n        }\n        &.reuseButtonDisable{\n           background-color: #ddd;\n           &:hover{\n            background-color: #ddd;\n           }\n        }\n    }\n\n    &.reuseSingleField{\n        .reuseInputField{\n            width: 100%;\n            float: none;\n            display: block;\n            overflow: hidden;\n            border: 1px solid @_reuse--Color-Border-Color;\n            .reuse--Transition-BAZIAR;\n        }\n    }\n}\n.reuseRepeatableField{\n  display: block;\n  overflow: hidden;\n  margin-bottom: 15px;\n\n  &:last-child{\n    margin-bottom: 0;\n  }\n}\n\n\n.reuseClearBtn {\n  width: 30px;\n  height: 42px;\n  display: inline-flex;\n  align-items: center;\n  justify-content: center;\n  background: none;\n  border: 0;\n  outline: 0;\n  position: absolute;\n  right: 0;\n  bottom: 0;\n\n  &:after {\n    content: "\\f2d7";\n    font-family: "Ionicons";\n    font-size: @_reuse--FontSize + 2;\n    color: @_reuse--Color-Black-737373;\n    line-height: 1;\n    .reuse--Transition;\n  }\n}\n','// @import \'./icons.less\';\n\n// @import "../re-button/button.less";\n\n// FONT Size\n@_reuse--FontSize: 14px;\n\n// FONT WEIGHT\n@_reuse--FontWeight-Thin: 100;\n@_reuse--FontWeight-Light: 300;\n@_reuse--FontWeight-Regular: 400;\n@_reuse--FontWeight-Medium: 500;\n@_reuse--FontWeight-Bold: 700;\n\n\n// TEXT COLOR\n@_reuse--TextColor-Light: #9da3a9;\n@_reuse--TextColor-Lighter: #bfc4ca;\n@_reuse--TextColor-Regular: #888888;\n@_reuse--TextColor-Dark: #484848;\n@_reuse--TextColor-LightDark: #585858;\n@_reuse--TextColor-Heading: #727c87;\n\n\n\n// Default Primary Color\n// @_reuse--Color-Primary : #7e57c2;\n@_reuse--Color-Primary : #506DAD;\n@_reuse--Color-PrimaryHover : darken(@_reuse--Color-Primary, 10%);\n\n@_reuse--Color-Secondary : #595e80;\n@_reuse--Color-SecondaryHover : darken(@_reuse--Color-Secondary, 10%);\n\n\n// GRAY COLOR\n@_reuse--Color-Gray-BDBDBD : #bdbdbd;\n@_reuse--Color-Gray-BFC4CA : #bfc4ca;\n@_reuse--Color-Gray-DEE0E2 : #dee0e2;\n@_reuse--Color-Border-Color : #e3e3e3;  // Border Color\n@_reuse--Color-Border-ColorAlt : #dddddd;  // Border Color\n@_reuse--Color-Gray-EEEEEE : #eeeeee;\n@_reuse--Color-Gray-E8E8E8 : #E8E8E8;\n@_reuse--Color-Gray-F1F1F1 : #f1f1f1;\n@_reuse--Color-Gray-F3F3F3 : #f3f3f3;\n@_reuse--Color-Gray-F5F5F5 : #f5f5f5;\n@_reuse--Color-Gray-F9F9F9 : #f9f9f9;\n@_reuse--Color-Gray-FAFAFA: #fafafa;\n@_reuse--Color-Gray-FDFDFD: #fdfdfd;\n\n@_reuse--Color-White: #ffffff;\n\n@_reuse--Color-Black-454545: #454545;\n@_reuse--Color-Black-454545Hover : darken(@_reuse--Color-Black-454545, 10%);\n@_reuse--Color-Black-454545Light : lighten(@_reuse--Color-Black-454545, 20%);\n\n@_reuse--Color-Black-737373: #737373;\n@_reuse--Color-Black-737373Hover : darken(@_reuse--Color-Black-737373, 10%);\n@_reuse--Color-Black-737373Light : lighten(@_reuse--Color-Black-737373, 12%);\n\n@_reuse--Color-White : #ffffff;\n\n\n// GREEN COLOR\n@_reuse--Color-Green : #4ac5b6;\n@_reuse--Color-Green-Light : #2ecc71;\n@_reuse--Color-Green-Alt : #A5E512;\n@_reuse--Color-Green-Lighter : #f4f5f1;\n\n\n// RED COLOR\n@_reuse--Color-Red : #fc4a52;\n@_reuse--Color-Red-Dark : #d3394c;\n@_reuse--Color-Red-Light: #ff6060;\n@_reuse--Color-Red-Light-1 : #fd7c7c;\n\n\n// YELLOW COLOR\n@_reuse--Color-Yellow : #feb909;\n@_reuse--Color-Yellow-Alt : #ffbd21;\n@_reuse--Color-Yellow-Light : #fad733;\n\n// BLUE COLOR\n@_reuse--Color-Blue : #217aff;\n@_reuse--Color-Blue-Dark : #2672ad;\n\n\n// Border Color\n@_reuse--Color-Border-Error : #e53935;\n\n// Responsive Utilities\n@smartphone_port : ~"only screen and (max-width: 767px)";\n@smartphone_land : ~"only screen and (min-width: 480px) and (max-width: 767px)";\n@tablet_port : ~"only screen and (min-width: 768px) and (max-width: 991px)";\n@tablet_land : ~"only screen and (min-width: 992px) and (max-width: 1199px)";\n@larger_res : ~"only screen and (min-width: 1600px) and (max-width: 2800px)";\n\n// TRANSITION\n.reuse--Transition (@time : .35s, @prop : all){\n  -webkit-transition: @prop @time ease;\n     -moz-transition: @prop @time ease;\n      -ms-transition: @prop @time ease;\n       -o-transition: @prop @time ease;\n          transition: @prop @time ease;\n}\n\n.reuse--Transition-BAZIAR (@btime : .8s){\n  -webkit-transition: all @btime cubic-bezier(.28,.75,.25,1);\n     -moz-transition: all @btime cubic-bezier(.28,.75,.25,1);\n       -ms-transition: all @btime cubic-bezier(.28,.75,.25,1);\n          -o-transition: all @btime cubic-bezier(.28,.75,.25,1);\n              transition: all @btime cubic-bezier(.28,.75,.25,1);\n}\n\n// BORDER RADIUS\n.reuse--BorderRadius (@radius : 5px 5px 5px 5px){\n  -webkit-border-radius: @radius;\n     -moz-border-radius: @radius;\n       -o-border-radius: @radius;\n          border-radius: @radius;\n}\n\n// DROP SHADOW\n.reuse--DropShadow (@values){\n  -webkit-box-shadow: @values;\n     -moz-box-shadow: @values;\n          box-shadow: @values;\n}\n\n// Transparent Color\n.reuse--Overlay (@r: 0, @g: 0, @b: 0, @a: 0.31){\n  background-color: rgba(@r, @g, @b, @a);\n}\n\n// TRANSFORM\n.reuse--Transform (@x, @y){\n  -webkit-transform: translate(@x,@y);\n     -moz-transform: translate(@x,@y);\n      -ms-transform: translate(@x,@y);\n       -o-transform: translate(@x,@y);\n          transform: translate(@x,@y);\n}\n'],sourceRoot:""}]),n.locals={reuseInputField:"reuseInputField___76TPG",reuseArrowMove:"reuseArrowMove___2FUMa",reuseRepeatableTextbox:"reuseRepeatableTextbox___3D7J7",reuseButton:"reuseButton___3v9f3",reuseDeleteButton:"reuseDeleteButton___3Mfr_",reuseButtonDisable:"reuseButtonDisable___2W4pC",reuseSingleField:"reuseSingleField___2cJ2a",reuseRepeatableField:"reuseRepeatableField___3PqlM",reuseClearBtn:"reuseClearBtn___1Zo5E"}},839:function(e,n,o){var t=o(803);"string"==typeof t&&(t=[[e.i,t,""]]),o(434)(t,{}),t.locals&&(e.exports=t.locals)}});