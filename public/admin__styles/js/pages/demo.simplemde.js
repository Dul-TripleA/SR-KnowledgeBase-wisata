!(function (e) {
  "use strict";
  function i() {}
  (i.prototype.init = function () {
    new SimpleMDE({
      element: document.getElementById("add_desc_wisata"),
      spellChecker: !1,
      autosave: { enabled: !0, unique_id: "add_desc_wisata" },
    });
  }),
    (e.SimpleMDEEditor = new i()),
    (e.SimpleMDEEditor.Constructor = i);
})(window.jQuery),
  (function () {
    "use strict";
    window.jQuery.SimpleMDEEditor.init();
  })();

!(function (e) {
  "use strict";
  function i() {}
  (i.prototype.init = function () {
    new SimpleMDE({
      element: document.getElementById("web_desc"),
      spellChecker: !1,
      autosave: { enabled: !0, unique_id: "web_desc" },
    });
  }),
    (e.SimpleMDEEditor = new i()),
    (e.SimpleMDEEditor.Constructor = i);
})(window.jQuery),
  (function () {
    "use strict";
    window.jQuery.SimpleMDEEditor.init();
  })();

  
(function (e) {
  "use strict";

  function i() {}

  i.prototype.init = function () {
    document
      .querySelectorAll("textarea[id^='edit_wisata_desc_']")
      .forEach(function (textarea) {
        new SimpleMDE({
          element: textarea,
          spellChecker: false,
          autosave: {
            enabled: true,
            unique_id: textarea.id,
          },
        });
      });
  };

  e.SimpleMDEEditor = new i();
  e.SimpleMDEEditor.Constructor = i;
})(window.jQuery);

(function () {
  "use strict";
  window.jQuery.SimpleMDEEditor.init();
})();
