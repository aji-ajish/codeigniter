<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1IngestConversationsRequest extends \Google\Model
{
  protected $conversationConfigType = GoogleCloudContactcenterinsightsV1IngestConversationsRequestConversationConfig::class;
  protected $conversationConfigDataType = '';
  public $conversationConfig;
  protected $gcsSourceType = GoogleCloudContactcenterinsightsV1IngestConversationsRequestGcsSource::class;
  protected $gcsSourceDataType = '';
  public $gcsSource;
  /**
   * @var string
   */
  public $parent;
  protected $transcriptObjectConfigType = GoogleCloudContactcenterinsightsV1IngestConversationsRequestTranscriptObjectConfig::class;
  protected $transcriptObjectConfigDataType = '';
  public $transcriptObjectConfig;

  /**
   * @param GoogleCloudContactcenterinsightsV1IngestConversationsRequestConversationConfig
   */
  public function setConversationConfig(GoogleCloudContactcenterinsightsV1IngestConversationsRequestConversationConfig $conversationConfig)
  {
    $this->conversationConfig = $conversationConfig;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1IngestConversationsRequestConversationConfig
   */
  public function getConversationConfig()
  {
    return $this->conversationConfig;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1IngestConversationsRequestGcsSource
   */
  public function setGcsSource(GoogleCloudContactcenterinsightsV1IngestConversationsRequestGcsSource $gcsSource)
  {
    $this->gcsSource = $gcsSource;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1IngestConversationsRequestGcsSource
   */
  public function getGcsSource()
  {
    return $this->gcsSource;
  }
  /**
   * @param string
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return string
   */
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1IngestConversationsRequestTranscriptObjectConfig
   */
  public function setTranscriptObjectConfig(GoogleCloudContactcenterinsightsV1IngestConversationsRequestTranscriptObjectConfig $transcriptObjectConfig)
  {
    $this->transcriptObjectConfig = $transcriptObjectConfig;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1IngestConversationsRequestTranscriptObjectConfig
   */
  public function getTranscriptObjectConfig()
  {
    return $this->transcriptObjectConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1IngestConversationsRequest::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1IngestConversationsRequest');
