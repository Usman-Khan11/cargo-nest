<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bl;
use App\Models\BlTemplate;
use App\Models\SubCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlTemplateController extends Controller
{

    protected $variables;

    function __construct()
    {
        $this->variables = [
            "pfx" => "prefix",
            "aut" => "last_number",
            "job" => "job_no",
            "pol" => "code",
        ];
    }

    private function set($bl_id, $bl_template_id, $format, $update = false)
    {
        if (!$bl_id || !$bl_template_id || !$format) {
            return '';
        }

        $format = explode("~", strtolower($format));
        $res = null;

        $bl = Bl::with('bl_detail', 'port_of_loading')->where('id', $bl_id)->first();
        $bl_template = BlTemplate::find($bl_template_id);

        foreach ($format as $key) {
            $value = $this->variables[$key];

            if ($key == "pfx") {
                $res .= $bl_template->$value;
            }

            if ($key == "aut") {
                $aut = $bl_template->$value;
                $res .= str_pad($aut + 1, $bl_template->padding, '0', STR_PAD_LEFT);

                if ($update) {
                    $bl_template->increment($bl_template->$value);
                }
            }

            if ($key == "job") {
                $res .= $bl->$value;
            }

            if ($key == "pol") {
                $res .= $bl->port_of_loading->$value;
            }
        }

        return $res;
    }

    public function create(Request $request)
    {
        $data['seo_title']      = "B/L Template";
        $data['seo_desc']       = "B/L Template";
        $data['seo_keywords']   = "B/L Template";
        $data['page_title'] = "B/L Template";

        // return $this->set(4, 1, 'PFX~AUT~POL');

        $data['sub_companies'] = SubCompany::select(["id", "name as text"])->orderBy('id', 'desc')->get();
        $data['sub_companies'] = $data['sub_companies']->toArray();

        return view('admin.bl_template.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'format_name' => 'required|string|max:200',
            'sub_company_id' => 'required|exists:sub_company,id',
            'mark_container_lines' => 'nullable|integer',
            'mark_container_character' => 'nullable|integer',
            'description_lines' => 'nullable|integer',
            'description_character' => 'nullable|integer',
            'packages_lines' => 'nullable|integer',
            'packages_character' => 'nullable|integer',
            'container_data_lines' => 'nullable|integer',
            'container_data_character' => 'nullable|integer',
            'nature' => 'nullable|string|max:50',
            'principal' => 'nullable|string|max:200',
            'blank_page_path' => 'nullable|string|max:200',
            'pre_printed_path' => 'nullable|string|max:200',
            'prefix' => 'nullable|string|max:10',
            'format' => 'nullable|string|max:100',
            'last_number' => 'nullable|integer',
            'padding' => 'nullable|integer',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $bl_template = new BlTemplate();
            $bl_template->format_name = $request->format_name;
            $bl_template->sub_company_id = $request->sub_company_id;
            $bl_template->mark_container_lines = $request->mark_container_lines;
            $bl_template->mark_container_character = $request->mark_container_character;
            $bl_template->description_lines = $request->description_lines;
            $bl_template->description_character = $request->description_character;
            $bl_template->packages_lines = $request->packages_lines;
            $bl_template->packages_character = $request->packages_character;
            $bl_template->container_data_lines = $request->container_data_lines;
            $bl_template->container_data_character = $request->container_data_character;
            $bl_template->nature = $request->nature;
            $bl_template->principal = $request->principal;
            $bl_template->all_companies = $request->all_companies ? 1 : 0;
            $bl_template->fix_format = $request->fix_format ? 1 : 0;
            $bl_template->blank_page_path = $request->blank_page_path;
            $bl_template->pre_printed_path = $request->pre_printed_path;
            $bl_template->auto_generate_bl_number = $request->auto_generate_bl_number ? 1 : 0;
            $bl_template->edit_allowed = $request->edit_allowed ? 1 : 0;
            $bl_template->default = $request->default ? 1 : 0;
            $bl_template->prefix = $request->prefix;
            $bl_template->format = $request->format;
            $bl_template->last_number = $request->last_number;
            $bl_template->padding = $request->padding;
            if ($request->hasFile('signature')) {
                $files = $request->file('signature');
                $filename = uniqid() . '.' . $files->getClientOriginalExtension();
                $directory = 'assets/upload/';
                $path = $files->move($directory, $filename);
                $bl_template->signature = $filename;
            }
            $bl_template->save();

            DB::commit();
            $notify[] = ['success', 'BL Template Added Successfully.'];
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
        }

        return redirect()->route('admin.bl_template.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'format_name' => 'required|string|max:200',
            'sub_company_id' => 'required|exists:sub_company,id',
            'mark_container_lines' => 'nullable|integer',
            'mark_container_character' => 'nullable|integer',
            'description_lines' => 'nullable|integer',
            'description_character' => 'nullable|integer',
            'packages_lines' => 'nullable|integer',
            'packages_character' => 'nullable|integer',
            'container_data_lines' => 'nullable|integer',
            'container_data_character' => 'nullable|integer',
            'nature' => 'nullable|string|max:50',
            'principal' => 'nullable|string|max:200',
            'blank_page_path' => 'nullable|string|max:200',
            'pre_printed_path' => 'nullable|string|max:200',
            'prefix' => 'nullable|string|max:10',
            'format' => 'nullable|string|max:100',
            'last_number' => 'nullable|integer',
            'padding' => 'nullable|integer',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $bl_template = BlTemplate::find($request->id);
            $bl_template->format_name = $request->format_name;
            $bl_template->sub_company_id = $request->sub_company_id;
            $bl_template->mark_container_lines = $request->mark_container_lines;
            $bl_template->mark_container_character = $request->mark_container_character;
            $bl_template->description_lines = $request->description_lines;
            $bl_template->description_character = $request->description_character;
            $bl_template->packages_lines = $request->packages_lines;
            $bl_template->packages_character = $request->packages_character;
            $bl_template->container_data_lines = $request->container_data_lines;
            $bl_template->container_data_character = $request->container_data_character;
            $bl_template->nature = $request->nature;
            $bl_template->principal = $request->principal;
            $bl_template->all_companies = $request->all_companies ? 1 : 0;
            $bl_template->fix_format = $request->fix_format ? 1 : 0;
            $bl_template->blank_page_path = $request->blank_page_path;
            $bl_template->pre_printed_path = $request->pre_printed_path;
            $bl_template->auto_generate_bl_number = $request->auto_generate_bl_number ? 1 : 0;
            $bl_template->edit_allowed = $request->edit_allowed ? 1 : 0;
            $bl_template->default = $request->default ? 1 : 0;
            $bl_template->prefix = $request->prefix;
            $bl_template->format = $request->format;
            $bl_template->last_number = $request->last_number;
            $bl_template->padding = $request->padding;
            if ($request->hasFile('signature')) {
                $files = $request->file('signature');
                $filename = uniqid() . '.' . $files->getClientOriginalExtension();
                $directory = 'assets/upload/';
                $path = $files->move($directory, $filename);
                $bl_template->signature = $filename;
            }
            $bl_template->save();

            DB::commit();
            $notify[] = ['success', 'BL Template Updated Successfully.'];
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
        }

        return redirect()->route('admin.bl_template.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $arr = [
            "bl_template" => []
        ];

        $data = BlTemplate::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $arr["bl_template"] = $data->first();

        return $arr;
    }
}
