require "test_helper"

class ProductsControllerTest < ActionDispatch::IntegrationTest
  setup do
    @product = products(:one)
  end

  test "should get index" do
    get products_url
    assert_response :success
  end

  test "should get new" do
    get new_product_url
    assert_response :success
  end

  test "should create product" do
    assert_difference("Product.count") do
      post products_url, params: { product: { cod_institute: @product.cod_institute, cod_senecyt: @product.cod_senecyt, name: @product.name, physical_code: @product.physical_code, previous_cod: @product.previous_cod, product_brand: @product.product_brand, product_color: @product.product_color, product_condition: @product.product_condition, product_description: @product.product_description, product_material: @product.product_material, product_model: @product.product_model, product_serie: @product.product_serie, product_type: @product.product_type } }
    end

    assert_redirected_to product_url(Product.last)
  end

  test "should show product" do
    get product_url(@product)
    assert_response :success
  end

  test "should get edit" do
    get edit_product_url(@product)
    assert_response :success
  end

  test "should update product" do
    patch product_url(@product), params: { product: { cod_institute: @product.cod_institute, cod_senecyt: @product.cod_senecyt, name: @product.name, physical_code: @product.physical_code, previous_cod: @product.previous_cod, product_brand: @product.product_brand, product_color: @product.product_color, product_condition: @product.product_condition, product_description: @product.product_description, product_material: @product.product_material, product_model: @product.product_model, product_serie: @product.product_serie, product_type: @product.product_type } }
    assert_redirected_to product_url(@product)
  end

  test "should destroy product" do
    assert_difference("Product.count", -1) do
      delete product_url(@product)
    end

    assert_redirected_to products_url
  end
end
