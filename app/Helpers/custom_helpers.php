<?php

if (!function_exists('in_group')) {
    /**
     * Format a date to a readable string.
     *
     * @param  string $date
     * @param  string $format
     * @return string
     */
    function in_group($group)
    {
        $user_group_id=auth()->user()->group_id;

        $group_key = DB::table('groups')->where('id', $user_group_id)->first()->key;
        // dd($group_key, $user_group_id);

        if ($group == $group_key) {
            return true;
        }else{
            return false;
        }
    }
    /**
     * Check if user can perform an action based on group permissions.
     *
     * @param  string $key
     * @return bool
     */
    function if_can($key)
    {
        $userGroupId = auth()->user()->group_id;

        $groupPermissions = DB::table('grouppermitions')
            ->where('group_id', $userGroupId)
            ->pluck('permission_id')
            ->toArray();

        $permissionId = DB::table('permissions')
            ->where('key', $key)
            ->value('id');

        return in_array($permissionId, $groupPermissions);
    }
}
