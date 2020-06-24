<?php
declare(strict_types=1);

namespace EMQX\API\Factory;

use EMQX\API\Common\Response;

class DataFactory extends Factory
{
    /**
     * 获取当前的导出文件信息列表，包括文件名、大小和创建时间
     * @return Response
     */
    public function getExport(): Response
    {
        return $this->client->request(
            'GET',
            ['data', 'export']
        );
    }

    /**
     * 导出当前数据到文件
     * @return Response
     */
    public function addExport(): Response
    {
        return $this->client->request(
            'POST',
            ['data', 'export']
        );
    }

    /**
     * 从指定文件导入数据
     * @param string $filename
     * @return Response
     */
    public function import(string $filename): Response
    {
        return $this->client->request(
            'POST',
            ['data', 'import'],
            [],
            [
                'filename' => $filename
            ]
        );
    }

    /**
     * 下载数据文件
     * @param string $filename
     * @return Response
     */
    public function download(string $filename): Response
    {
        return $this->client->request(
            'GET',
            ['data', 'file', $filename]
        );
    }

    /**
     * 上传数据文件
     * @param string $filename
     * @param string $file
     * @return Response
     */
    public function upload(string $filename, string $file): Response
    {
        return $this->client->request(
            'POST',
            ['data', 'file'],
            [],
            [
                'filename' => $filename,
                'file' => $file
            ]
        );
    }

    /**
     * 远程删除数据文件
     * @param string $filename
     * @return Response
     */
    public function delete(string $filename): Response
    {
        return $this->client->request(
            'DELETE',
            ['data', 'file', $filename]
        );
    }
}