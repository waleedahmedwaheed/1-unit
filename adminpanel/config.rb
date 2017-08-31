ignore "lib/*"
theme_name = 'BlackTieAdmin'

###
# Page options, layouts, aliases and proxies
###

# Per-page layout changes:
# 
# With no layout
# page "/path/to/file.html", :layout => false
# 
# With alternative layout
# page "/path/to/file.html", :layout => :otherlayout
# 
# A path which all have the same layout
# with_layout :admin do
#   page "/admin/*"
# end

# Proxy (fake) files
# page "/this-page-has-no-template.html", :proxy => "/template-file.html" do
#   @which_fake_page = "Rendering a fake page with a variable"
# end

###
# Helpers
###

# Automatic image dimensions on image_tag helper
# activate :automatic_image_sizes

# Methods defined in the helpers block are available in templates
# helpers do
#   def some_helper
#     "Helping"
#   end
# end

set :css_dir, 'stylesheets'

set :js_dir, 'javascripts'

set :images_dir, 'images'

after_configuration do
  Less.paths << File.expand_path(css_dir, source_dir)
  Less.paths << File.expand_path('bootstrap/less', source_dir)

  lib_dir = File.expand_path('lib', source_dir)
  map "/lib" do
    run Rack::Directory.new(lib_dir)
  end
end

after_build do
    FileUtils.cp_r(File.expand_path('lib', source_dir), File.expand_path('lib', build_dir))

    release_dir = File.expand_path('../../builds/' + theme_name, source_dir)
    print "Copying to release directory:\n" + release_dir + "\n\n"
    FileUtils.rm_rf(release_dir)
    FileUtils.cp_r(File.expand_path('../', source_dir), release_dir)

    FileUtils.rm_rf(File.expand_path('.DS_Store', release_dir))
    FileUtils.rm_rf(File.expand_path('.gitignore', release_dir))
    FileUtils.rm_rf(File.expand_path('.bundle', release_dir))

    FileUtils.rm_rf(File.expand_path('build/.DS_Store', release_dir))
    FileUtils.rm_rf(File.expand_path('build/.gitignore', release_dir))
    FileUtils.rm_rf(File.expand_path('build/.bundle', release_dir))
    FileUtils.rm_rf(File.expand_path('source/.DS_Store', release_dir))
    FileUtils.rm_rf(File.expand_path('source/.gitignore', release_dir))
    FileUtils.rm_rf(File.expand_path('source/.bundle', release_dir))
    FileUtils.rm_rf(File.expand_path('source/images/.DS_Store', release_dir))
    FileUtils.rm_rf(File.expand_path('source/images/.gitignore', release_dir))
    FileUtils.rm_rf(File.expand_path('source/images/.bundle', release_dir))
    FileUtils.rm_rf(File.expand_path('source/lib/.DS_Store', release_dir))
    FileUtils.rm_rf(File.expand_path('source/lib/.gitignore', release_dir))
    FileUtils.rm_rf(File.expand_path('source/lib/.bundle', release_dir))
    FileUtils.rm_rf(File.expand_path('source/stylesheets/.DS_Store', release_dir))
    FileUtils.rm_rf(File.expand_path('source/stylesheets/.gitignore', release_dir))
    FileUtils.rm_rf(File.expand_path('source/stylesheets/.bundle', release_dir))

end

# Build-specific configuration
configure :build do
  # For example, change the Compass output style for deployment
  # activate :minify_css
  
  # Minify Javascript on build
  # activate :minify_javascript
  
  # Enable cache buster
  # activate :cache_buster
  
  # Use relative URLs
  # activate :relative_assets
  
  # Compress PNGs after build
  # First: gem install middleman-smusher
  # require "middleman-smusher"
  # activate :smusher
  
  # Or use a different image path
  # set :http_path, "/Content/images/"
end

helpers do
  def active(id)
    if data.page.menukey == id
        return 'class="active"'
    end

    return ''
  end

  def menu_item(id, caption = nil)
    return "<li #{active(id.downcase.gsub(' ', '-'))}><a href=\"#{id.downcase.gsub(' ', '-')}.html\">#{caption || id}</a></li>"
  end

  def expand_if(id, menu)
    return " in" if id == menu
  end
end
